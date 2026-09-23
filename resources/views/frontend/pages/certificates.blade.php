@extends('layouts.frontend')

@section('title', 'Certificates — Adi Prasetyo')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Mapping nama sertifikat ke gambar preview
    |--------------------------------------------------------------------------
    */

    $previewMap = [

        // 1. JavaScript
        'sertifikat_belajar_dasprog_javascript'
            => 'assets/certificates/sertifikat_belajar_dasprog_javascript.png',

        // 2. DQLAB
        'certificate-dqlab'
            => 'assets/certificates/certificate-DQLAB.png',

        // 3. Dasar Pemrograman
        'sertifikat_coding_belajar_dasar_pemrograman'
            => 'assets/certificates/sertifikat-coding.png',

        // 4. Financial Literacy
        'introduction_to_financial_literacy'
            => 'assets/certificates/sertifikat-financial-literacy.png',

        // 5. MySQL
        'database_mysql_tingkat_dasar'
            => 'assets/certificates/sertifikat-mysql.png',

        // 6. Front End
        'sertifikat_membuat_front_end'
            => 'assets/certificates/sertifikat-frontend.png',

        // 7. SQA
        'sertifikat_software_quality_assurance_basic_level'
            => 'assets/certificates/sertifikat-sqa-basic-level.png',

        // 8. Database Administrator
        'sertifikat_database_administrator'
            => 'assets/certificates/sertifikat-database-administrator.png',

        // 9. Sosial dan Media II
        'sertifikat_sosial_dan_media_ii'
            => 'assets/certificates/sertifikat-sosial-media-ii.png',

        // 10. Python
        'memulai_pemrograman_dengan_python'
            => 'assets/certificates/sertifikat-pemrograman-python.png',

        // 11. Cloud & Gen AI AWS
        'belajar_dasar_cloud_dan_gen_ai_di_aws'
            => 'assets/certificates/sertifikat-dasar-cloud-gen-ai-aws.png',

        // 12. Spec-Driven Development Kiro
        'spec_driven_development_dengan_kiro'
            => 'assets/certificates/sertifikat-spec-driven-development-kiro.png',
    ];

    /*
    |--------------------------------------------------------------------------
    | Fungsi normalisasi nama
    |--------------------------------------------------------------------------
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
    | Cari gambar preview
    |--------------------------------------------------------------------------
    */

    $getPreview = function ($certificate) use ($previewMap, $normalize) {

        $name = $normalize($certificate->name);

        foreach ($previewMap as $key => $image) {

            $normalizedKey = $normalize($key);

            if ($name === $normalizedKey) {
                return asset($image);
            }
        }

        /*
        | Kalau tidak ketemu berdasarkan nama,
        | gunakan kolom image dari database.
        */

        if (!empty($certificate->image)) {

            $image = ltrim($certificate->image, '/');

            return asset($image);
        }

        return null;
    };

    /*
    |--------------------------------------------------------------------------
    | Link file sertifikat
    |--------------------------------------------------------------------------
    */

    $getCertificateLink = function ($certificate) {

        if (!empty($certificate->file)) {

            $file = ltrim($certificate->file, '/');

            return asset($file);
        }

        if (!empty($certificate->credential_url)) {
            return $certificate->credential_url;
        }

        return null;
    };
@endphp


<section class="page-hero">
    <div class="container">

        <span class="eyebrow">
            Certificates
        </span>

        <h1>
            Sertifikat &amp; Pencapaian
        </h1>

        <p>
            Kumpulan sertifikat yang diperoleh dari berbagai kegiatan
            pembelajaran, pelatihan, dan pengembangan kompetensi.
        </p>

    </div>
</section>


<section class="section">
    <div class="container">

        @if($certificates->count())

            <div class="certificates-grid">

                @foreach($certificates as $item)

                    @php
                        $previewUrl = $getPreview($item);
                        $certificateLink = $getCertificateLink($item);
                    @endphp

                    <article class="certificate-card">

                        {{-- =====================================================
                             GAMBAR SERTIFIKAT
                        ====================================================== --}}

                        <div class="certificate-image">

                            @if($previewUrl)

                                <img
                                    src="{{ $previewUrl }}"
                                    alt="{{ $item->name }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="certificate-placeholder">
                                    <span>Certificate</span>
                                </div>

                            @endif

                        </div>


                        {{-- =====================================================
                             INFORMASI SERTIFIKAT
                        ====================================================== --}}

                        <div class="certificate-content">

                            <span class="certificate-number">
                                Certificate {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <h2>
                                {{ $item->name }}
                            </h2>

                            @if($item->issuer)

                                <p class="certificate-issuer">
                                    {{ $item->issuer }}
                                </p>

                            @endif


                            @if($item->issued_at)

                                <p class="certificate-date">
                                    {{ $item->issued_at }}
                                </p>

                            @endif


                            @if($item->description)

                                <p class="certificate-description">
                                    {{ $item->description }}
                                </p>

                            @endif


                            @if($item->credential_id)

                                <div class="certificate-credential">

                                    <span>
                                        Credential ID
                                    </span>

                                    <strong>
                                        {{ $item->credential_id }}
                                    </strong>

                                </div>

                            @endif


                            {{-- =================================================
                                 TOMBOL
                            ================================================== --}}

                            @if($certificateLink)

                                <a
                                    href="{{ $certificateLink }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="certificate-button"
                                >
                                    Buka File Sertifikat
                                    <span>↗</span>
                                </a>

                            @endif

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <h2>
                    Belum ada sertifikat
                </h2>

                <p>
                    Sertifikat akan ditampilkan di halaman ini setelah
                    data ditambahkan.
                </p>

            </div>

        @endif

    </div>
</section>

@endsection