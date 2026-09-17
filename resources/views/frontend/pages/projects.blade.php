@extends('layouts.frontend')
@section('title','Projects — Adi Prasetyo')
@section('content')
@include('frontend.partials.page-hero',[
    'kicker'=>'Projects',
    'title'=>'Hal yang telah <span>saya bangun.</span>',
    'description'=>'Kumpulan project yang telah dipublikasikan. Setiap project memiliki halaman detail sendiri agar lebih nyaman untuk dipelajari.'
])
<section class="section section-paper">
    <div class="container">
        @if($projects->count())
            <div class="page-project-grid">
                @foreach($projects as $project)
                    <a class="project-card" href="{{ route('projects.show', $project) }}">
                        <div class="project-thumb">
                            @if($project->thumbnail)
                                <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->name }}" loading="lazy">
                            @else
                                <div class="project-placeholder">{{ str($project->name)->substr(0,1) }}</div>
                            @endif
                            <div class="project-overlay">Buka detail project ↗</div>
                        </div>
                        <div class="project-content">
                            <div><span>{{ $project->category ?: 'PROJECT' }}</span><span>{{ $project->year ?: '—' }}</span></div>
                            <h3>{{ $project->name }}</h3>
                            @if($project->short_description)<p>{{ $project->short_description }}</p>@endif
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="empty-state"><div class="empty-icon">▣</div><h3>Belum ada project</h3><p>Project yang berstatus published akan tampil di halaman ini.</p></div>
        @endif
    </div>
</section>
@endsection
