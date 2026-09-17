@extends('layouts.frontend')

@section('title', 'Adi Prasetyo — Portfolio')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Preview sertifikat yang ditampilkan di HOME
    |--------------------------------------------------------------------------
    */

    $homeCertificates = [
        [
            'name' => 'certificate-DQLAB',
            'title' => 'certificate-DQLAB',
            'issuer' => 'DQLAB',
            'date' => '11 Januari 2025',
            'image' => 'certificate-DQLAB.png',
        ],

        [
            'name' => 'financial-literacy',
            'title' => 'Introduction to Financial Literacy',
            'issuer' => 'DQLAB',
            'date' => '22 Januari 2026',
            'image' => 'sertifikat-financial-literacy.png',
        ],

        [
            'name' => 'mysql',
            'title' => 'Database MySQL (Tingkat Dasar)',
            'issuer' => 'Dicoding',
            'date' => '11 Agustus 2025',
            'image' => 'sertifikat-mysql.png',
        ],
    ];
@endphp


{{-- =========================================================
     HERO
========================================================= --}}

<section class="hero">

    <div class="container hero-grid">

        <div class="hero-copy">

            <div class="eyebrow">
                <span class="pulse"></span>
                Terbuka untuk proyek kreatif & web
            </div>

            <h1>
                Hai, saya <span>Adi Prasetyo.</span><br>
                <strong>Saya mengubah ide menjadi solusi digital.</strong>
            </h1>

            <p class="hero-lead">
                Mahasiswa Sistem Informasi yang tertarik pada web development,
                desain, photo editing, dan pembuatan konten digital.
            </p>

            <div class="hero-actions">

                <a
                    class="btn btn-primary"
                    href="{{ route('projects.index') }}"
                >
                    Lihat Project <span>↗</span>
                </a>

                <a
                    class="btn btn-ghost"
                    href="{{ route('contact') }}"
                >
                    Hubungi Saya
                </a>

            </div>

            <div class="hero-mini">

                <div>
                    <b>{{ $stats['experiences'] }}+</b>
                    <span>Pengalaman</span>
                </div>

                <div>
                    <b>{{ $stats['skills'] }}+</b>
                    <span>Keahlian</span>
                </div>

                <div>
                    <b>{{ $stats['projects'] }}</b>
                    <span>Project</span>
                </div>

            </div>

        </div>


        <div class="hero-visual">

            <div class="cover-backdrop">

                <img
                    src="{{ asset('assets/images/cover.png') }}"
                    alt="Foto sampul Adi Prasetyo"
                >

            </div>

            <div class="hero-orbit"></div>

            <div class="profile-frame">

                <div class="profile-glow"></div>

                <img
                    src="{{ asset('assets/images/profile.png') }}"
                    alt="Foto profil Adi Prasetyo"
                >

            </div>


            <div class="float-card card-one">

                <span>✦</span>

                <div>
                    <b>Web Development</b>
                    <small>Laravel · PHP · MySQL</small>
                </div>

            </div>


            <div class="float-card card-two">

                <span>✎</span>

                <div>
                    <b>Creative Editing</b>
                    <small>Canva · Photo · Content</small>
                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     INTRO
========================================================= --}}

<section class="section section-paper">

    <div class="container home-intro-grid">

        <div class="home-intro-card">

            <span class="section-kicker">
                PORTFOLIO
            </span>

            <strong>
                Rapi secara visual, terstruktur secara teknis.
            </strong>

            <p>
                Jelajahi perjalanan, keahlian, karya, dan pengalaman saya
                melalui halaman yang dibuat khusus untuk setiap bagian.
            </p>

            <div class="home-links">

                <a href="{{ route('about') }}">About</a>

                <a href="{{ route('education') }}">Education</a>

                <a href="{{ route('experience') }}">Experience</a>

                <a href="{{ route('skills') }}">Skills</a>

                <a href="{{ route('certificates') }}">Certificates</a>

            </div>

        </div>


        <div>

            <span class="section-kicker">
                TENTANG PORTFOLIO
            </span>

            <h2
                style="
                    margin-top:10px;
                    font:700 clamp(34px,4vw,52px)/1.05 'Playfair Display',Georgia,serif;
                "
            >
                Satu website untuk mengenal
                <span style="color:#b5795d;">
                    proses di balik karya.
                </span>
            </h2>

            <p
                class="section-copy"
                style="margin-top:17px;"
            >
                Website ini menjadi ruang untuk menampilkan perjalanan
                pendidikan, pengalaman kerja, aktivitas organisasi,
                kemampuan yang sedang dikembangkan, sertifikat,
                dan project yang telah dipublikasikan.
            </p>

            <div style="margin-top:22px;">

                <a
                    class="btn btn-ghost"
                    href="{{ route('about') }}"
                    style="width:auto;"
                >
                    Kenali Saya Lebih Dekat ↗
                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     PROJECT
========================================================= --}}

<section class="section section-soft">

    <div class="container">

        <div class="section-head">

            <div>

                <span class="section-kicker">
                    PROJECT TERBARU
                </span>

                <h2>
                    Karya yang <span>sudah dibangun.</span>
                </h2>

            </div>

            <p>
                Beberapa project pilihan. Buka detail masing-masing project
                untuk melihat deskripsi dan tautan terkait.
            </p>

        </div>


        @if($projects->count())

            <div class="featured-grid">

                @foreach($projects->take(3) as $project)

                    <a
                        class="project-card"
                        href="{{ route('projects.show', $project) }}"
                    >

                        <div class="project-thumb">

                            @if($project->thumbnail)

                                <img
                                    src="{{ asset($project->thumbnail) }}"
                                    alt="{{ $project->name }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="project-placeholder">
                                    {{ str($project->name)->substr(0,1) }}
                                </div>

                            @endif

                            <div class="project-overlay">
                                Lihat project ↗
                            </div>

                        </div>


                        <div class="project-content">

                            <div>

                                <span>
                                    {{ $project->category ?: 'PROJECT' }}
                                </span>

                                <span>
                                    {{ $project->year ?: '—' }}
                                </span>

                            </div>

                            <h3>
                                {{ $project->name }}
                            </h3>

                            @if($project->short_description)

                                <p>
                                    {{ $project->short_description }}
                                </p>

                            @endif

                        </div>

                    </a>

                @endforeach

            </div>


            <div class="view-all">

                <a
                    class="btn btn-primary"
                    href="{{ route('projects.index') }}"
                    style="width:auto;"
                >
                    Lihat Semua Project ↗
                </a>

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    ▣
                </div>

                <h3>
                    Project segera hadir
                </h3>

                <p>
                    Belum ada project yang dipublikasikan.
                    Project dapat dikelola melalui dashboard admin.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================================================
     CERTIFICATES PILIHAN
========================================================= --}}

<section class="section section-paper home-certificates-section">

    <div class="container">

        <div class="section-head home-certificates-head">

            <div>

                <span class="section-kicker">
                    CERTIFICATES
                </span>

                <h2>
                    Beberapa <span>pencapaian.</span>
                </h2>

            </div>

            <div>

                <p>
                    Beberapa sertifikat yang menjadi bagian dari proses
                    belajar dan pengembangan diri.
                </p>

                <a
                    href="{{ route('certificates') }}"
                    class="certificate-view-all"
                >
                    Lihat Semua Sertifikat ↗
                </a>

            </div>

        </div>


        <div class="home-certificate-grid">

            @foreach($homeCertificates as $certificate)

                <article class="home-certificate-card">

                    <a
                        href="{{ route('certificates') }}"
                        class="home-certificate-preview"
                    >

                        <img
                            src="{{ asset('storage/certificates/' . $certificate['image']) }}"
                            alt="{{ $certificate['title'] }}"
                            loading="lazy"
                        >

                        <span class="home-certificate-overlay">
                            Lihat Sertifikat ↗
                        </span>

                    </a>


                    <div class="home-certificate-content">

                        <span class="home-certificate-label">
                            CERTIFICATE
                        </span>

                        <h3>
                            {{ $certificate['title'] }}
                        </h3>

                        <div class="home-certificate-meta">

                            <span>
                                {{ $certificate['issuer'] }}
                            </span>

                            <span>
                                {{ $certificate['date'] }}
                            </span>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================================================
     CONTACT
========================================================= --}}

<section class="section contact-section">

    <div class="container contact-grid">

        <div>

            <span class="section-kicker">
                SIAP BERKOLABORASI?
            </span>

            <h2>
                Punya ide? Mari <span>ngobrol.</span>
            </h2>

            <p>
                Untuk website, desain, editing, atau sekadar berdiskusi
                tentang project digital, kamu bisa menghubungi saya
                melalui halaman contact.
            </p>

        </div>


        <div>

            <a
                class="btn btn-primary"
                href="{{ route('contact') }}"
                style="width:auto;"
            >
                Buka Halaman Contact ↗
            </a>

        </div>

    </div>

</section>


{{-- =========================================================
     STYLE KHUSUS HOME CERTIFICATES
========================================================= --}}

<style>

    .home-certificates-section {
        overflow: hidden;
    }


    .home-certificates-head {
        align-items: flex-end;
    }


    .home-certificates-head > div:last-child {
        max-width: 430px;
    }


    .home-certificates-head p {
        margin-bottom: 12px;
    }


    .certificate-view-all {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        color: #9a654e;

        font-size: .82rem;
        font-weight: 700;

        text-decoration: none;

        border-bottom: 1px solid rgba(154, 101, 78, .3);

        padding-bottom: 3px;

        transition: .2s ease;
    }


    .certificate-view-all:hover {
        color: #6e4939;
        border-color: #6e4939;
    }


    /*
    |--------------------------------------------------------------------------
    | 3 COLUMN CERTIFICATE
    |--------------------------------------------------------------------------
    */

    .home-certificate-grid {

        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 24px;

        margin-top: 38px;

        align-items: start;
    }


    .home-certificate-card {

        min-width: 0;

        background: #fffdf9;

        border: 1px solid rgba(103, 95, 84, .13);

        border-radius: 18px;

        overflow: hidden;

        box-shadow:
            0 12px 35px rgba(70, 55, 42, .06);

        transition:
            transform .25s ease,
            box-shadow .25s ease;
    }


    .home-certificate-card:hover {

        transform: translateY(-5px);

        box-shadow:
            0 18px 45px rgba(70, 55, 42, .1);
    }


    /*
    |--------------------------------------------------------------------------
    | PREVIEW
    |--------------------------------------------------------------------------
    */

    .home-certificate-preview {

        position: relative;

        display: flex;

        align-items: center;
        justify-content: center;

        height: 245px;

        overflow: hidden;

        background: #f4eee5;

        text-decoration: none;
    }


    .home-certificate-preview img {

        display: block;

        width: 100%;
        height: 100%;

        object-fit: contain;

        padding: 14px;

        transition:
            transform .35s ease;
    }


    .home-certificate-card:hover
    .home-certificate-preview img {

        transform: scale(1.025);
    }


    /*
    |--------------------------------------------------------------------------
    | OVERLAY
    |--------------------------------------------------------------------------
    */

    .home-certificate-overlay {

        position: absolute;

        left: 0;
        right: 0;
        bottom: 0;

        padding: 18px;

        display: flex;

        justify-content: center;

        background:
            linear-gradient(
                to top,
                rgba(40, 31, 25, .72),
                rgba(40, 31, 25, 0)
            );

        color: #fff;

        font-size: .78rem;
        font-weight: 700;

        opacity: 0;

        transform: translateY(8px);

        transition: .25s ease;
    }


    .home-certificate-card:hover
    .home-certificate-overlay {

        opacity: 1;

        transform: translateY(0);
    }


    /*
    |--------------------------------------------------------------------------
    | CONTENT
    |--------------------------------------------------------------------------
    */

    .home-certificate-content {

        padding: 20px 20px 22px;
    }


    .home-certificate-label {

        display: block;

        margin-bottom: 8px;

        color: #a36d55;

        font-size: .65rem;

        font-weight: 800;

        letter-spacing: .12em;
    }


    .home-certificate-content h3 {

        margin: 0;

        color: #302a25;

        font-size: 1.05rem;

        line-height: 1.35;
    }


    .home-certificate-meta {

        display: flex;

        flex-direction: column;

        gap: 4px;

        margin-top: 12px;

        color: #766e64;

        font-size: .75rem;
    }


    /*
    |--------------------------------------------------------------------------
    | RESPONSIVE
    |--------------------------------------------------------------------------
    */

    @media (max-width: 900px) {

        .home-certificate-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }

    }


    @media (max-width: 620px) {

        .home-certificate-grid {
            grid-template-columns: 1fr;
        }

        .home-certificate-preview {
            height: 250px;
        }

    }

</style>

@endsection