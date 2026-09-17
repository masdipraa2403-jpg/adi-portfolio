@extends('layouts.frontend')
@section('title','Experience — Adi Prasetyo')
@section('content')
@include('frontend.partials.page-hero',[
    'kicker'=>'Experience',
    'title'=>'Pengalaman kerja & <span>lapangan.</span>',
    'description'=>'Pengalaman yang membentuk disiplin, komunikasi, pelayanan, teamwork, dan kemampuan beradaptasi.'
])
<section class="section section-paper">
    <div class="container">
        @if($experiences->count())
            <div class="experience-grid">
                @foreach($experiences as $item)
                    <article class="experience-card">
                        <div class="exp-icon">{{ str_pad($loop->iteration,2,'0',STR_PAD_LEFT) }}</div>
                        <div class="exp-body">
                            <div class="exp-meta">
                                <span>
                                    {{ $item->start_date?->format('Y') }}
                                    @if($item->end_date) — {{ $item->end_date->format('Y') }} @else — Sekarang @endif
                                </span>
                                @if($item->location)<span>📍 {{ $item->location }}</span>@endif
                            </div>
                            <h3>{{ $item->position }}</h3>
                            <h4>{{ $item->company }}</h4>
                            @if($item->description)<p>{{ $item->description }}</p>@endif
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state"><div class="empty-icon">◴</div><h3>Belum ada pengalaman</h3><p>Data pengalaman akan tampil setelah ditambahkan melalui admin.</p></div>
        @endif
    </div>
</section>
@endsection
