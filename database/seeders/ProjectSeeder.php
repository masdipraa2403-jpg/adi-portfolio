<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data project lama agar tidak terjadi duplikat.
        DB::table('projects')->truncate();

        // Masukkan seluruh project dari database lokal.
        DB::table('projects')->insert([
            [
                'name' => 'WEB PARFUM PRAMIL LUXE',
                'slug' => 'crud-pramil',
                'category' => 'Web Development',
                'thumbnail' => 'images/projects/crud-pramil.png',
                'short_description' => 'Aplikasi e-commerce berbasis Laravel untuk mengelola produk, keranjang, pesanan, pembayaran, dan pelanggan.',
                'description' => 'website penjualan parfum dengan tampilan clean dibuat untuk memudahkan dalam mencari parfum terbaik dan wangi elegan',
                'year' => '2025/2026',
                'github_url' => 'https://github.com/masdipraa2403-jpg/crud-pramil',
                'demo_url' => null,
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'GaskeunOtoride',
                'slug' => 'gaskeunotoride',
                'category' => 'Web Development',
                'thumbnail' => 'images/projects/Gaskeun-Otoride.jpeg',
                'short_description' => 'Platform web GaskeunOtoride untuk mendukung kebutuhan layanan dan pengelolaan data secara digital.',
                'description' => "GaskeunOtoride adalah website rental mobil dan motor yang dibuat untuk memberikan pengalaman pencarian dan pemesanan kendaraan secara lebih mudah. Website ini menyediakan informasi kendaraan yang tersedia, halamandetail layanan, fitur booking, serta halaman kontak untuk memudahkan pelanggan menghubungi penyedia rental.\n\nDalam pengembangan project ini, saya mengerjakan struktur halaman website, tampilan antarmuka yang responsif, pengelolaan informasi kendaraan, serta interaksi menggunakan JavaScript. Project dibangun menggunakan HTML, CSS/SCSS, dan JavaScript.\n\nHalaman utama project meliputi Home, About, Cars, Motor, Booking, dan Contact sehingga pengguna dapat menjelajahi layanan dan informasi kendaraan dengan lebih terstruktur.",
                'year' => '2025',
                'github_url' => 'https://github.com/masdipraa2403-jpg/GaskeunOtoride',
                'demo_url' => null,
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Dipra Store',
                'slug' => 'dipra-sore',
                'category' => 'Web Development',
                'thumbnail' => 'images/projects/Dipra-Store.jpeg',
                'short_description' => 'Platform DIpra Store untuk mendukung kebutuhan layanan Handphone secara online',
                'description' => null,
                'year' => '2025',
                'github_url' => null,
                'demo_url' => null,
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Dipra GEAR',
                'slug' => 'dipra-gear',
                'category' => 'Web Development',
                'thumbnail' => 'images/projects/DIPRA-GEAR.jpeg',
                'short_description' => 'aplikasi e-commerce yang menyediakan berbagai perlengkapan outdoor dan alat kebutuhan kampung, seperti tenda, carrier, sleeping bag, alat masak, kursi lipat, lampu, dan perlengkapan lainnya. Aplikasi ini memudahkan pengguna untuk mencari dan membeli perlengkapan outdoor secara praktis.',
                'description' => null,
                'year' => '2026',
                'github_url' => null,
                'demo_url' => null,
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'SIPRANA',
                'slug' => 'siprana',
                'category' => 'Web Development',
                'thumbnail' => 'images/projects/SIPRANA.jpeg',
                'short_description' => 'SIPRANA adalah aplikasi pengaduan sarana dan prasarana yang memudahkan pengguna melaporkan berbagai masalah di lingkungan kampus, seperti kerusakan gedung, listrik, air, internet, dan fasilitas lainnya. Pengguna',
                'description' => null,
                'year' => '2026',
                'github_url' => null,
                'demo_url' => null,
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => "Rayan'Store.id",
                'slug' => 'rayanstoreid',
                'category' => 'Web Development',
                'thumbnail' => 'images/projects/RAYANSTORE.jpeg',
                'short_description' => 'Rayan’Store.Id adalah website top up game dan jual beli akun dengan proses cepat, aman, dan harga terjangkau. Tersedia berbagai game populer seperti Mobile Legends, Free Fire, PUBG Mobile, dan lainnya.',
                'description' => null,
                'year' => '2025',
                'github_url' => null,
                'demo_url' => null,
                'status' => 'published',
                'is_featured' => true,
                'sort_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}