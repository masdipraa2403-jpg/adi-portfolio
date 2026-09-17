<div class="page-hero">
    <div class="container page-hero-inner">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a><span>›</span><span>{{ $kicker ?? 'Portfolio' }}</span>
        </div>
        <span class="section-kicker">{{ $kicker ?? 'Portfolio' }}</span>
        <h1>{!! $title ?? 'Portfolio' !!}</h1>
        <p>{{ $description ?? '' }}</p>
    </div>
</div>
