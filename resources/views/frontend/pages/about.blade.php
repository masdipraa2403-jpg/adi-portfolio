@extends('layouts.frontend')
@section('title','About — Adi Prasetyo')
@section('content')
@include('frontend.partials.page-hero',[
    'kicker'=>'Tentang Saya',
    'title'=>'Mengenal <span>Adi Prasetyo.</span>',
    'description'=>'Ruang singkat untuk mengenal latar belakang, minat, dan cara saya memandang proses membangun karya digital.'
])
<section class="section section-paper">
    <div class="container split-grid">
        <div class="section-intro">
            <span class="section-kicker">PROFILE</span>
            <h2>Developer yang suka <span>membangun & mengedit.</span></h2>
            <div class="profile-facts">
                <div class="profile-fact"><small>Fokus</small><strong>Web · Design · Editing</strong></div>
                <div class="profile-fact"><small>Bidang Studi</small><strong>Sistem Informasi</strong></div>
                <div class="profile-fact"><small>Tools</small><strong>Laravel · PHP · MySQL</strong></div>
                <div class="profile-fact"><small>Creative</small><strong>Canva · Photo Editing</strong></div>
            </div>
        </div>
        <div class="about-copy">
            <p>Saya Adi Prasetyo, mahasiswa S1 Sistem Informasi yang sedang mengembangkan kemampuan di bidang web development sekaligus creative editing.</p>
            <p>Saya menikmati proses mengubah ide menjadi website, sistem informasi, desain visual, maupun konten digital yang rapi dan mudah digunakan.</p>
            <p>Setiap project saya anggap sebagai kesempatan untuk belajar: mulai dari menyusun kebutuhan, membangun tampilan, mengolah data, sampai memastikan hasil akhirnya nyaman digunakan.</p>
            <div class="about-tags">
                <span>Laravel</span><span>PHP</span><span>MySQL</span><span>HTML</span><span>CSS</span><span>JavaScript</span><span>Canva</span><span>UI/UX</span>
            </div>
        </div>
    </div>
</section>
@endsection
