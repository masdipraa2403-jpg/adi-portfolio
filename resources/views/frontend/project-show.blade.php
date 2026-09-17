@extends('layouts.frontend')

@section('title', $project->name . ' — Adi Prasetyo')

@section('content')
<section class="project-detail">
    <div class="container">
        <a class="back-link" href="{{ route('projects.index') }}">← Kembali ke Projects</a>

        <div class="detail-head">
            <span class="section-kicker">{{ $project->category ?: 'PROJECT' }}</span>
            <h1>{{ $project->name }}</h1>
            @if($project->short_description)
                <p>{{ $project->short_description }}</p>
            @endif

            <div class="detail-actions">
                @if($project->github_url)
                    <a class="btn btn-ghost" href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer">GitHub ↗</a>
                @endif
                @if($project->demo_url)
                    <a class="btn btn-primary" href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer">Live Demo ↗</a>
                @endif
            </div>
        </div>

        <div class="detail-layout">
            <article class="detail-main">
                @if($project->thumbnail)
                    <img class="detail-image" src="{{ asset($project->thumbnail) }}" alt="{{ $project->name }}">
                @endif

                @if($project->images->count())
                    <div class="detail-gallery">
                        @foreach($project->images as $image)
                            <img src="{{ asset($image->path) }}" alt="{{ $project->name }} screenshot {{ $loop->iteration }}" loading="lazy">
                        @endforeach
                    </div>
                @endif

                <div class="detail-text">
                    @if($project->description)
                        {!! nl2br(e($project->description)) !!}
                    @else
                        <p>Belum ada deskripsi detail untuk project ini.</p>
                    @endif
                </div>
            </article>

            <aside class="detail-side">
                <div><small>Year</small><b>{{ $project->year ?: '—' }}</b></div>
                <div><small>Status</small><b>{{ ucfirst($project->status) }}</b></div>

                @if($project->technologies->count())
                    <div>
                        <small>Technologies</small>
                        <div class="tech-list">
                            @foreach($project->technologies as $technology)
                                <span>{{ $technology->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </aside>
        </div>
    </div>
</section>
@endsection
