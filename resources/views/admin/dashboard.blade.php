@extends('layouts.admin')

@section('title', 'Dashboard — Admin')
@section('heading', 'Dashboard')

@section('content')
<div class="welcome-card">
    <div>
        <span class="section-kicker">WELCOME BACK</span>
        <h2>Manage your portfolio.</h2>
        <p>Semua konten website dapat dikelola dari satu dashboard yang rapi.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('home') }}" target="_blank" rel="noopener">View Website ↗</a>
</div>

<div class="admin-stat-grid">
    @php
        $cards = [
            ['key'=>'projects','label'=>'Projects'],
            ['key'=>'skills','label'=>'Skills'],
            ['key'=>'certificates','label'=>'Certificates'],
            ['key'=>'experiences','label'=>'Experience'],
            ['key'=>'organizations','label'=>'Organization'],
            ['key'=>'educations','label'=>'Education'],
            ['key'=>'messages','label'=>'Messages'],
        ];
    @endphp

    @foreach($cards as $card)
        <a class="admin-stat-card" href="{{ route('admin.content.index', $card['key']) }}">
            <span>{{ $card['label'] }}</span>
            <strong>{{ $stats[$card['key']] }}</strong>
            <small>Manage →</small>
        </a>
    @endforeach
</div>

<div class="admin-panel">
    <div class="panel-head">
        <div>
            <span class="section-kicker">CONTENT FLOW</span>
            <h2>Website structure</h2>
        </div>
    </div>

    <div class="flow-grid">
        <div><b>01</b><strong>Profile & Education</strong><span>Informasi diri dan perjalanan pendidikan.</span></div>
        <div><b>02</b><strong>Experience & Organization</strong><span>Riwayat kerja dan aktivitas organisasi.</span></div>
        <div><b>03</b><strong>Skills & Certificates</strong><span>Keahlian dan bukti pembelajaran.</span></div>
        <div><b>04</b><strong>Projects & Messages</strong><span>Karya portfolio dan pesan dari pengunjung.</span></div>
    </div>
</div>
@endsection
