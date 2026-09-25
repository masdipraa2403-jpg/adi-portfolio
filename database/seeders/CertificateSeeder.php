<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus seluruh data sertifikat lama agar tidak terjadi duplikat.
        DB::table('certificates')->truncate();

        // Masukkan 14 sertifikat.
        DB::table('certificates')->insert([

            // =========================================================
            // 1. JavaScript
            // =========================================================
            [
                'name' => 'sertifikat_belajar dasprog_javascript',
                'issuer' => 'Coding Camp Power by DBS Foundation',
                'issued_at' => '2024',
                'credential_id' => null,
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat_belajar_dasprog_javascript.png',
                'file' => null,
                'description' => null,
                'is_active' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 2. DQLAB
            // =========================================================
            [
                'name' => 'certificate-DQLAB',
                'issuer' => 'DQLAB',
                'issued_at' => '2025',
                'credential_id' => null,
                'credential_url' => null,
                'image' => 'assets/certificates/certificate-DQLAB.png',
                'file' => null,
                'description' => null,
                'is_active' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 3. Dasar Pemrograman
            // =========================================================
            [
                'name' => 'sertifikat_coding,belajar dasar pemrograman',
                'issuer' => 'Coding Camp Power by DBS Foundation',
                'issued_at' => '2025',
                'credential_id' => null,
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-coding.png',
                'file' => null,
                'description' => null,
                'is_active' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 4. Introduction to Financial Literacy
            // =========================================================
            [
                'name' => 'Introduction to Financial Literacy',
                'issuer' => 'Coding Camp Power by DBS Foundation',
                'issued_at' => '2025',
                'credential_id' => null,
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-financial-literacy.png',
                'file' => null,
                'description' => null,
                'is_active' => true,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 5. Database MySQL
            // =========================================================
            [
                'name' => 'Database MySQL (Tingkat Dasar)',
                'issuer' => 'PT Nimcomlab Teknologi Indonesia',
                'issued_at' => '2025',
                'credential_id' => null,
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-mysql.png',
                'file' => null,
                'description' => null,
                'is_active' => true,
                'sort_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 6. Front End
            // =========================================================
            [
                'name' => 'sertifikat membuat Front End',
                'issuer' => 'Coding Camp Power by DBS Foundation',
                'issued_at' => '2024',
                'credential_id' => null,
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-frontend.png',
                'file' => null,
                'description' => null,
                'is_active' => true,
                'sort_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 7. Software Quality Assurance
            // =========================================================
            [
                'name' => 'Sertifikat_Software Quality Assurance Basic Level',
                'issuer' => 'PT Nimcomlab Teknologi Indonesia',
                'issued_at' => '2026',
                'credential_id' => null,
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-sqa-basic-level.png',
                'file' => null,
                'description' => null,
                'is_active' => true,
                'sort_order' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 8. Database Administrator
            // =========================================================
            [
                'name' => 'Sertifikat Database Administrator',
                'issuer' => 'LSP Universitas Bina Sarana Informatika',
                'issued_at' => '2026',
                'credential_id' => 'sertifikat Database Administator',
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-database-administrator.png',
                'file' => null,
                'description' => 'Sertifikat kompetensi Data Management dengan skema Database Administrator yang menunjukkan kemampuan dalam pengelolaan dan pemeliharaan basis data.',
                'is_active' => true,
                'sort_order' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 9. Sosial dan Media II
            // =========================================================
            [
                'name' => 'Sertifikat Sosial dan Media II',
                'issuer' => 'UKM Kerohanian Islam UBSI Kampus Kota Tegal',
                'issued_at' => '2026',
                'credential_id' => '7347',
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-sosial-media-ii.png',
                'file' => null,
                'description' => 'Sertifikat kegiatan Sosial dan Media II sebagai bagian dari aktivitas dan pengembangan pengalaman organisasi di UKM Kerohanian Islam UBSI Kampus Kota Tegal.',
                'is_active' => true,
                'sort_order' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 10. Memulai Pemrograman dengan Python
            // =========================================================
            [
                'name' => 'Memulai Pemrograman dengan Python',
                'issuer' => 'Dicoding',
                'issued_at' => '2026-09-23',
                'credential_id' => 'KEXLMLDMRZG2',
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-pemrograman-python.png',
                'file' => 'assets/certificates/sertifikat-pemrograman-python.pdf',
                'description' => 'Sertifikat kelulusan kelas Memulai Pemrograman dengan Python.',
                'is_active' => true,
                'sort_order' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 11. Belajar Dasar Cloud dan Gen AI di AWS
            // =========================================================
            [
                'name' => 'Belajar Dasar Cloud dan Gen AI di AWS',
                'issuer' => 'Dicoding',
                'issued_at' => '2026-09-22',
                'credential_id' => '07Z6Q8E8RZQR',
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-dasar-cloud-gen-ai-aws.png',
                'file' => 'assets/certificates/sertifikat-dasar-cloud-gen-ai-aws.pdf',
                'description' => 'Sertifikat kelulusan kelas Belajar Dasar Cloud dan Gen AI di AWS.',
                'is_active' => true,
                'sort_order' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 12. Spec-Driven Development dengan Kiro
            // =========================================================
            [
                'name' => 'Spec-Driven Development dengan Kiro',
                'issuer' => 'Dicoding',
                'issued_at' => '2026-09-22',
                'credential_id' => 'N9ZO05QV8XG5',
                'credential_url' => null,
                'image' => 'assets/certificates/sertifikat-spec-driven-development-kiro.png',
                'file' => 'assets/certificates/sertifikat-spec-driven-development-kiro.pdf',
                'description' => 'Sertifikat kelulusan kelas Spec-Driven Development dengan Kiro.',
                'is_active' => true,
                'sort_order' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 13. Membangun Aplikasi Gen AI dengan Microsoft Azure
            // =========================================================
            [
                'name' => 'Membangun Aplikasi Gen AI dengan Microsoft Azure',
                'issuer' => 'Dicoding',
                'issued_at' => '2026-09-24',
                'credential_id' => 'EYX4OY46WXDL',
                'credential_url' => 'https://www.dicoding.com/certificates/EYX4OY46WXDL',
                'image' => 'assets/certificates/sertifikat-membangun-aplikasi-gen-ai-azure.png',
                'file' => null,
                'description' => 'Sertifikat kelulusan kelas Membangun Aplikasi Gen AI dengan Microsoft Azure.',
                'is_active' => true,
                'sort_order' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =========================================================
            // 14. Belajar Penerapan Data Science dengan Microsoft Fabric
            // =========================================================
            [
                'name' => 'Belajar Penerapan Data Science dengan Microsoft Fabric',
                'issuer' => 'Dicoding',
                'issued_at' => '2026-09-24',
                'credential_id' => 'JMZVL1KWOXN9',
                'credential_url' => 'https://www.dicoding.com/certificates/JMZVL1KWOXN9',
                'image' => 'assets/certificates/sertifikat-penerapan-data-science-microsoft-fabric.png',
                'file' => null,
                'description' => 'Sertifikat kelulusan kelas Belajar Penerapan Data Science dengan Microsoft Fabric.',
                'is_active' => true,
                'sort_order' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}