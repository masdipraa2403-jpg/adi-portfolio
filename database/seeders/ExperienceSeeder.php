<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('work_experiences')->truncate();

        DB::table('work_experiences')->insert([
            [
                'company' => 'PT Aisin Indonesia',
                'position' => 'Operator Produksi',
                'location' => null,
                'start_date' => '2022-01-01',
                'end_date' => '2023-12-31',
                'description' => null,
                'logo' => null,
                'is_active' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'company' => 'PT Astra Daihatsu Motor',
                'position' => 'Operator Produksi',
                'location' => null,
                'start_date' => '2023-01-01',
                'end_date' => '2024-01-01',
                'description' => null,
                'logo' => null,
                'is_active' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'company' => 'OPPO Experience Store Cilandak',
                'position' => 'Store Crew',
                'location' => 'Cilandak',
                'start_date' => '2024-01-01',
                'end_date' => '2024-12-31',
                'description' => null,
                'logo' => null,
                'is_active' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'company' => 'KPU',
                'position' => 'KPPS Pemilu 2024',
                'location' => null,
                'start_date' => '2024-01-01',
                'end_date' => '2024-02-14',
                'description' => null,
                'logo' => null,
                'is_active' => true,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'company' => 'Pantarlih Pilkada Serentak 2024',
                'position' => 'Pantarlih',
                'location' => null,
                'start_date' => '2024-06-01',
                'end_date' => '2024-07-24',
                'description' => null,
                'logo' => null,
                'is_active' => true,
                'sort_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'company' => 'KPPS Pilkada Serentak 2024',
                'position' => 'KPPS',
                'location' => null,
                'start_date' => '2024-11-01',
                'end_date' => '2024-11-27',
                'description' => null,
                'logo' => null,
                'is_active' => true,
                'sort_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'company' => 'Indomaret',
                'position' => 'Store Crew',
                'location' => null,
                'start_date' => '2025-01-01',
                'end_date' => '2025-12-31',
                'description' => null,
                'logo' => null,
                'is_active' => true,
                'sort_order' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}