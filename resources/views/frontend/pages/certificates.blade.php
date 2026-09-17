@extends('layouts.frontend')

@section('title', 'Certificates — Adi Prasetyo')

@section('content')

@include('frontend.partials.page-hero', [
    'kicker' => 'Certificates',
    'title' => 'Bukti <span>pembelajaran.</span>',
    'description' => 'Sertifikat dan pencapaian yang menjadi bagian dari proses belajar dan pengembangan diri.'
])

@php
    /*
    |--------------------------------------------------------------------------
    | Mapping Preview Sertifikat
    |--------------------------------------------------------------------------
    |
    | Semua gambar berada di:
    | storage/app/public/certificates/
    |
    */

    $previewMap = [

        // 1. JavaScript
        'sertifikat_belajar_dasprog_javascript'
            => 'certificates/sertifikat_belajar_dasprog_javascript.png',

        // 2. DQLAB
        'certificate-dqlab'
            => 'certificates/certificate-DQLAB.png',

        // 3. Dasar Pemrograman
        'sertifikat_coding_belajar_dasar_pemrograman'
            => 'certificates/sertifikat-coding.png',

        // 4. Financial Literacy
        'introduction_to_financial_literacy'
            => 'certificates/sertifikat-financial-literacy.png',

        // 5. Database MySQL
        'database_mysql_tingkat_dasar'
            => 'certificates/sertifikat-mysql.png',

        // 6. Front End
        'sertifikat_membuat_front_end'
            => 'certificates/sertifikat-frontend.png',

        // 7. Software Quality Assurance
        'sertifikat_software_quality_assurance_basic_level'
            => 'certificates/sertifikat-sqa-basic-level.png',

        // 8. Database Administrator
        'sertifikat_database_administrator'
            => 'certificates/sertifikat-database-administrator.png',

        // 9. Sosial dan Media II
        'sertifikat_sosial_dan_media_ii'
            => 'certificates/sertifikat-sosial-media-ii.png',
    ];


    /*
    |--------------------------------------------------------------------------
    | Normalisasi Nama
    |--------------------------------------------------------------------------
    |
    | Supaya nama seperti:
    | "Sertifikat Database Administrator"
    | "sertifikat_database_administrator"
    | "sertifikat-database-administrator"
    |
    | tetap dianggap sama.
    |
    */

    $normalize = function ($value) {

        $value = strtolower(trim((string) $value));

        $value = str_replace(
            ['_', '-', ',', '.', '(', ')'],
            ' ',
            $value
        );

        $value = preg_replace('/\s+/', ' ', $value);

        return trim($value);
    };


    /*
    |--------------------------------------------------------------------------
    | Buat mapping yang sudah dinormalisasi
    |--------------------------------------------------------------------------
    */

    $normalizedPreviewMap = [];

    foreach ($previewMap as $name => $path) {
        $normalizedPreviewMap[$normalize($name)] = $path;
    }
@endphp


<section class="section section-paper">

    <div class="container">

        @if($certificates->count())

            <div class="certificate-grid">

                @foreach($certificates as $item)

                    @php

                        /*
                        |--------------------------------------------------------------------------
                        | Cari gambar preview
                        |--------------------------------------------------------------------------
                        */

                        $certificateName = $normalize($item->name ?? '');

                        $previewPath = $normalizedPreviewMap[$certificateName] ?? null;


                        /*
                        |--------------------------------------------------------------------------
                        | File sertifikat asli
                        |--------------------------------------------------------------------------
                        */

                        $fileUrl = null;

                        if ($item->file) {

                            $filePath = ltrim($item->file, '/');

                            /*
                            | Jika file berupa URL
                            */

                            if (
                                \Illuminate\Support\Str::startsWith(
                                    $filePath,
                                    ['http://', 'https://']
                                )
                            ) {

                                $fileUrl = $filePath;

                            } else {

                                /*
                                | Jika database menyimpan:
                                | storage/certificates/...
                                |
                                | hapus "storage/" agar tidak menjadi:
                                | storage/storage/...
                                */

                                if (
                                    \Illuminate\Support\Str::startsWith(
                                        $filePath,
                                        'storage/'
                                    )
                                ) {

                                    $filePath = substr(
                                        $filePath,
                                        strlen('storage/')
                                    );
                                }

                                $fileUrl = asset(
                                    'storage/' . $filePath
                                );
                            }
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | URL Preview
                        |--------------------------------------------------------------------------
                        */

                        $previewUrl = $previewPath
                            ? asset('storage/' . $previewPath)
                            : null;

                    @endphp


                    <article class="certificate-card">

                        {{-- =========================================================
                             PREVIEW SERTIFIKAT
                        ========================================================== --}}

                        @if($previewUrl)

                            <a
                                href="{{ $fileUrl ?? $previewUrl }}"
                                class="certificate-preview certificate-preview-image"
                                target="_blank"
                                rel="noopener noreferrer"
                            >

                                <img
                                    src="{{ $previewUrl }}"
                                    alt="{{ $item->name }}"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.parentElement.classList.add('certificate-image-error');"
                                >

                                <span class="certificate-preview-overlay">
                                    Lihat Sertifikat ↗
                                </span>

                            </a>


                        @elseif($fileUrl)

                            {{-- =====================================================
                                 FALLBACK PDF
                            ====================================================== --}}

                            <a
                                href="{{ $fileUrl }}"
                                class="certificate-preview"
                                target="_blank"
                                rel="noopener noreferrer"
                            >

                                <div class="certificate-preview-placeholder">

                                    <strong>PDF</strong>

                                    <span>
                                        Buka Sertifikat ↗
                                    </span>

                                </div>

                            </a>


                        @else

                            {{-- =====================================================
                                 JIKA PREVIEW DAN FILE TIDAK ADA
                            ====================================================== --}}

                            <div class="certificate-preview">

                                <div class="certificate-preview-placeholder">

                                    <strong>✦</strong>

                                    <span>
                                        Preview belum tersedia
                                    </span>

                                </div>

                            </div>

                        @endif


                        {{-- =========================================================
                             INFORMASI SERTIFIKAT
                        ========================================================== --}}

                        <div class="certificate-body">

                            <div class="certificate-icon">
                                ✦
                            </div>


                            <h3>
                                {{ $item->name }}
                            </h3>


                            @if($item->issuer)

                                <p>
                                    {{ $item->issuer }}
                                </p>

                            @endif


                            @if($item->issued_at)

                                <span>
                                    {{ $item->issued_at }}
                                </span>

                            @endif


                            @if($item->credential_id)

                                <span>
                                    Credential: {{ $item->credential_id }}
                                </span>

                            @endif


                            @if($fileUrl)

                                <a
                                    href="{{ $fileUrl }}"
                                    class="certificate-link"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Buka Sertifikat ↗
                                </a>


                            @elseif($item->credential_url)

                                <a
                                    href="{{ $item->credential_url }}"
                                    class="certificate-link"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Lihat Credential ↗
                                </a>

                            @endif

                        </div>

                    </article>

                @endforeach

            </div>


        @else

            {{-- =============================================================
                 EMPTY STATE
            ============================================================== --}}

            <div class="empty-state">

                <div class="empty-icon">
                    ✦
                </div>

                <h3>
                    Sertifikat segera hadir
                </h3>

                <p>
                    Belum ada sertifikat yang dipublikasikan.
                </p>

            </div>

        @endif

    </div>

</section>


<style>

    /*
    |--------------------------------------------------------------------------
    | Certificate Preview
    |--------------------------------------------------------------------------
    */

    .certificate-preview {

        position: relative;

        display: flex;

        align-items: center;

        justify-content: center;

        width: 100%;

        min-height: 280px;

        overflow: hidden;

        background: #f5f0e8;

        text-decoration: none;
    }


    /*
    |--------------------------------------------------------------------------
    | Certificate Image
    |--------------------------------------------------------------------------
    */

    .certificate-preview-image img {

        display: block;

        width: 100%;

        height: 280px;

        object-fit: contain;

        object-position: center;

        background: #f5f0e8;

        transition: transform .35s ease;
    }


    .certificate-preview-image:hover img {

        transform: scale(1.02);
    }


    /*
    |--------------------------------------------------------------------------
    | Hover Overlay
    |--------------------------------------------------------------------------
    */

    .certificate-preview-overlay {

        position: absolute;

        left: 0;

        right: 0;

        bottom: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 18px;

        background: linear-gradient(
            to top,
            rgba(30, 25, 20, .72),
            rgba(30, 25, 20, 0)
        );

        color: #fff;

        font-size: .82rem;

        font-weight: 600;

        opacity: 0;

        transform: translateY(8px);

        transition: .25s ease;
    }


    .certificate-preview-image:hover
    .certificate-preview-overlay {

        opacity: 1;

        transform: translateY(0);
    }


    /*
    |--------------------------------------------------------------------------
    | Broken Image Fallback
    |--------------------------------------------------------------------------
    */

    .certificate-image-error {

        background: #f5f0e8;
    }


    .certificate-image-error::after {

        content: 'Preview belum tersedia';

        display: flex;

        align-items: center;

        justify-content: center;

        width: 100%;

        height: 280px;

        color: #675f54;

        font-size: .82rem;
    }


    /*
    |--------------------------------------------------------------------------
    | PDF / Empty Placeholder
    |--------------------------------------------------------------------------
    */

    .certificate-preview-placeholder {

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        gap: 10px;

        width: 100%;

        min-height: 280px;

        color: #675f54;

        background: #f5f0e8;
    }


    .certificate-preview-placeholder strong {

        display: flex;

        align-items: center;

        justify-content: center;

        width: 64px;

        height: 64px;

        border: 1px solid rgba(103, 95, 84, .2);

        border-radius: 50%;

        font-size: 1rem;
    }


    .certificate-preview-placeholder span {

        font-size: .8rem;
    }


    /*
    |--------------------------------------------------------------------------
    | Certificate Body
    |--------------------------------------------------------------------------
    */

    .certificate-body {

        min-height: 160px;
    }


    .certificate-body h3 {

        line-height: 1.25;

        margin-bottom: 8px;
    }


    .certificate-body p {

        margin-bottom: 8px;
    }


    .certificate-body > span {

        display: block;

        margin-bottom: 5px;
    }


    /*
    |--------------------------------------------------------------------------
    | Responsive
    |--------------------------------------------------------------------------
    */

    @media (max-width: 768px) {

        .certificate-preview {

            min-height: 220px;
        }


        .certificate-preview-image img {

            height: 220px;
        }


        .certificate-preview-placeholder {

            min-height: 220px;
        }


        .certificate-image-error::after {

            height: 220px;
        }

    }

</style>

@endsection