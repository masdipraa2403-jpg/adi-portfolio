@extends('layouts.admin')

@php
    $titles = [
        'educations' => 'Pendidikan',
        'experiences' => 'Pengalaman Kerja',
        'organizations' => 'Organisasi',
        'skills' => 'Keahlian',
        'certificates' => 'Sertifikat',
        'projects' => 'Project',
        'messages' => 'Pesan',
    ];
    $title = $titles[$type] ?? ucfirst($type);
@endphp

@section('title', $title . ' — Admin')
@section('heading', $title)

@section('content')
<div class="content-toolbar">
    <div>
        <p class="muted">Kelola data {{ strtolower($title) }} yang tersimpan di database.</p>
    </div>

    @if($type !== 'messages')
        <a class="btn btn-primary" href="{{ route('admin.content.create', $type) }}">+ Tambah Data</a>
    @endif
</div>

<div class="admin-table-wrap">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Detail</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>
                        <strong>
                            @if($type === 'educations'){{ $item->institution }}
                            @elseif($type === 'experiences'){{ $item->company }}
                            @elseif($type === 'organizations'){{ $item->name }}
                            @elseif($type === 'skills'){{ $item->name }}
                            @elseif($type === 'certificates'){{ $item->name }}
                            @elseif($type === 'projects'){{ $item->name }}
                            @elseif($type === 'messages'){{ $item->name }}
                            @else{{ $item->name ?? '-' }}
                            @endif
                        </strong>
                        <small>
                            @if($type === 'messages'){{ $item->email }}
                            @elseif($type === 'skills'){{ $item->category ?: '—' }}
                            @elseif($type === 'certificates'){{ $item->issuer ?: '—' }}
                            @elseif($type === 'projects'){{ $item->category ?: '—' }}
                            @elseif($type === 'educations'){{ $item->major ?: '—' }}
                            @elseif($type === 'experiences'){{ $item->position }}
                            @elseif($type === 'organizations'){{ $item->position ?: '—' }}
                            @endif
                        </small>
                    </td>

                    <td>
                        @if($type === 'messages')
                            {{ \Illuminate\Support\Str::limit($item->message, 80) }}
                        @elseif($type === 'skills')
                            {{ $item->level }}%
                        @elseif($type === 'projects')
                            {{ ucfirst($item->status) }} @if($item->is_featured) · Featured @endif
                        @elseif($type === 'educations')
                            {{ $item->start_year }} — {{ $item->end_year ?: 'Sekarang' }}
                        @elseif($type === 'organizations')
                            {{ $item->period ?: '—' }}
                        @elseif($type === 'experiences')
                            {{ $item->start_date?->format('Y') }} — {{ $item->end_date?->format('Y') ?: 'Sekarang' }}
                        @elseif($type === 'certificates')
                            {{ $item->issued_at ?: '—' }}
                        @endif
                    </td>

                    <td>
                        @if($type === 'messages')
                            <span class="status {{ $item->is_read ? 'on' : 'off' }}">
                                {{ $item->is_read ? 'Sudah Dibaca' : 'Baru' }}
                            </span>
                        @elseif(isset($item->is_active))
                            <span class="status {{ $item->is_active ? 'on' : 'off' }}">
                                {{ $item->is_active ? 'Aktif' : 'Disembunyikan' }}
                            </span>
                        @elseif(isset($item->status))
                            <span class="status {{ $item->status === 'published' ? 'on' : 'off' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        @else
                            <span class="status on">Aktif</span>
                        @endif
                    </td>

                    <td class="actions">
                        @if($type === 'messages')
                            @if(!$item->is_read)
                                <form method="POST" action="{{ route('admin.messages.read', $item->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="icon-btn" type="submit">✓ Dibaca</button>
                                </form>
                            @else
                                <span class="muted" style="font-size:10px;">Sudah dibaca</span>
                            @endif
                        @else
                            <a class="icon-btn" href="{{ route('admin.content.edit', [$type, $item->id]) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.content.destroy', [$type, $item->id]) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="icon-btn danger" type="submit">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="table-empty">
                            <span>✦</span>
                            <h3>Belum ada data</h3>
                            <p>Tambahkan data pertama melalui tombol <strong>+ Tambah Data</strong>.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($items->hasPages())
        <div class="pagination">
            @if($items->onFirstPage())
                <span>←</span>
            @else
                <a href="{{ $items->previousPageUrl() }}">←</a>
            @endif

            @foreach($items->getUrlRange(max(1, $items->currentPage() - 2), min($items->lastPage(), $items->currentPage() + 2)) as $page => $url)
                @if($page == $items->currentPage())
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            @if($items->hasMorePages())
                <a href="{{ $items->nextPageUrl() }}">→</a>
            @else
                <span>→</span>
            @endif
        </div>
    @endif
</div>
@endsection
