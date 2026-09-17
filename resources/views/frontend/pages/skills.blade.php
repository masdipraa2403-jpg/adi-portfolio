@extends('layouts.frontend')
@section('title','Skills — Adi Prasetyo')
@section('content')
@include('frontend.partials.page-hero',[
    'kicker'=>'Skills',
    'title'=>'Apa yang <span>bisa saya lakukan.</span>',
    'description'=>'Perpaduan kemampuan development, database, design & editing, serta tools yang saya gunakan dalam proses belajar dan mengerjakan project.'
])
<section class="section section-paper">
    <div class="container">
        @if($skills->count())
            @php($groups = $skills->groupBy(fn($skill) => $skill->category ?: 'Lainnya'))
            <div class="skills-grid">
                @foreach($groups as $category => $items)
                    <article class="skill-card">
                        <div class="skill-head">
                            <div class="skill-icon">
                                @if($category === 'Web Development')⌘
                                @elseif($category === 'Database')◈
                                @elseif($category === 'Design & Editing')✦
                                @else◫
                                @endif
                            </div>
                            <div>
                                <h3>{{ $category }}</h3>
                                <span>{{ $items->count() }} keahlian</span>
                            </div>
                        </div>
                        <div class="skill-list">
                            @foreach($items as $skill)
                                <div>
                                    <div class="skill-label"><span>{{ $skill->name }}</span><b>{{ $skill->level }}%</b></div>
                                    <div class="progress"><i style="width:{{ min(max((int)$skill->level,0),100) }}%"></i></div>
                                </div>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state"><div class="empty-icon">✦</div><h3>Belum ada skill</h3><p>Data skill akan tampil setelah ditambahkan melalui admin.</p></div>
        @endif
    </div>
</section>
@endsection
