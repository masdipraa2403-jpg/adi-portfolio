<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data education lama agar tidak terjadi duplikat.
        DB::table('educations')->truncate();

        // Masukkan data education sesuai database lokal.
        DB::table('educations')->insert([
            [
                'institution' => 'SD Negri 03 Gunungagung',
                'major' => null,
                'start_year' => '2010',
                'end_year' => '2016',
                'description' => null,
                'logo' => null,
                'is_active' => true,
                'sort_order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'institution' => 'SMP Negeri 02 BUumijawa',
                'major' => null,
                'start_year' => '2016',
                'end_year' => '2019',
                'description' => null,
                'logo' => null,
                'is_active' => true,
                'sort_order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'institution' => 'SMK Negeri 1 Bumijawa',
                'major' => 'Teknik Kendaraan Ringan Otomotif',
                'start_year' => '2019',
                'end_year' => '2022',
                'description' => 'Pendidikan kejuruan di bidang Teknik Kendaraan Ringan Otomotif.',
                'logo' => null,
                'is_active' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'institution' => 'Universitas Bina Sarana Informatika',
                'major' => 'S1 Sistem Informasi',
                'start_year' => '2024',
                'end_year' => 'Sekarang',
                'description' => 'Menempuh pendidikan Sistem Informasi dengan fokus pada pengembangan sistem informasi dan teknologi web.',
                'logo' => null,
                'is_active' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}