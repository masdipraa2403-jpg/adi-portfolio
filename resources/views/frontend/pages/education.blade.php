@extends('layouts.frontend')
@section('title','Education — Adi Prasetyo')
@section('content')
@include('frontend.partials.page-hero',[
    'kicker'=>'Education',
    'title'=>'Perjalanan <span>pendidikan.</span>',
    'description'=>'Perjalanan pendidikan yang membentuk dasar pengetahuan, cara berpikir, dan cara saya bekerja.'
])
<section class="section section-paper">
    <div class="container">
        @if($educations->count())
            <div class="timeline">
                @foreach($educations as $item)
                    <article class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-card">
                            <div class="timeline-top">
                                <span class="period">{{ $item->start_year }} — {{ $item->end_year ?: 'Sekarang' }}</span>
                                <span class="badge">Pendidikan</span>
                            </div>
                            <h3>{{ $item->institution }}</h3>
                            @if($item->major)<h4>{{ $item->major }}</h4>@endif
                            @if($item->description)<p>{{ $item->description }}</p>@endif
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state"><div class="empty-icon">◎</div><h3>Belum ada data pendidikan</h3><p>Data pendidikan akan tampil di sini setelah ditambahkan melalui admin.</p></div>
        @endif
    </div>
</section>
@endsection
