@extends('layouts.frontend')
@section('title','Organization — Adi Prasetyo')
@section('content')
@include('frontend.partials.page-hero',[
    'kicker'=>'Organization',
    'title'=>'Organisasi & <span>kepemimpinan.</span>',
    'description'=>'Pengalaman organisasi yang membangun kemampuan komunikasi, kerja sama, tanggung jawab, dan kepemimpinan.'
])
<section class="section section-paper">
    <div class="container">
        @if($organizations->count())
            <div class="org-grid">
                @foreach($organizations as $item)
                    <article class="org-card">
                        <div class="org-number">{{ str_pad($loop->iteration,2,'0',STR_PAD_LEFT) }}</div>
                        <span class="period">{{ $item->period ?: '—' }}</span>
                        <h3>{{ $item->position ?: 'Anggota' }}</h3>
                        <h4>{{ $item->name }}</h4>
                        @if($item->location)<p style="margin-top:8px;color:#98734f;font-size:10px;">📍 {{ $item->location }}</p>@endif
                        @if($item->description)<p>{{ $item->description }}</p>@endif
                        @if($item->achievement)<p><strong style="color:#625548;">Pencapaian:</strong> {{ $item->achievement }}</p>@endif
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state"><div class="empty-icon">◈</div><h3>Belum ada organisasi</h3><p>Data organisasi akan tampil setelah ditambahkan melalui admin.</p></div>
        @endif
    </div>
</section>
@endsection
