<?php
namespace Database\Seeders;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email'=>'admin@adiprasetyo.dev'],[
            'name'=>'Adi Prasetyo','password'=>Hash::make('password'),'email_verified_at'=>now(),
        ]);

        $educations=[
            ['institution'=>'Universitas Bina Sarana Informatika','major'=>'S1 Sistem Informasi','start_year'=>'2024','end_year'=>'Sekarang','description'=>'Menempuh pendidikan Sistem Informasi dengan fokus pada pengembangan sistem informasi dan teknologi web.','is_active'=>true,'sort_order'=>1],
            ['institution'=>'SMK Negeri 1 Bumijawa','major'=>'Teknik Kendaraan Ringan Otomotif','start_year'=>'2019','end_year'=>'2022','description'=>'Pendidikan kejuruan di bidang Teknik Kendaraan Ringan Otomotif.','is_active'=>true,'sort_order'=>2],
        ]; foreach($educations as $x) Education::updateOrCreate(['institution'=>$x['institution']],$x);

        $experiences=[
            ['company'=>'PT Aisin Indonesia','position'=>'Operator Produksi','location'=>null,'start_date'=>'2022-09-01','end_date'=>'2023-09-01','description'=>'Menjalankan proses produksi dan menjaga kualitas pekerjaan sesuai standar operasional perusahaan.','logo'=>null,'is_active'=>true,'sort_order'=>1],
            ['company'=>'PT Astra Daihatsu Motor','position'=>'Operator Produksi','location'=>null,'start_date'=>'2023-10-01','end_date'=>'2024-09-01','description'=>'Menjalankan pekerjaan produksi setelah pengalaman kerja di PT Aisin.','logo'=>null,'is_active'=>true,'sort_order'=>2],
            ['company'=>'OPPO Experience Store Cilandak','position'=>'Store Crew','location'=>'Cilandak','start_date'=>'2024-10-01','end_date'=>'2024-12-31','description'=>'Membantu operasional toko dan pelayanan pelanggan.','logo'=>null,'is_active'=>true,'sort_order'=>3],
            ['company'=>'KPU','position'=>'KPPS Pemilu 2024','location'=>null,'start_date'=>'2024-02-14','end_date'=>'2024-02-14','description'=>'Berpartisipasi sebagai petugas KPPS pada Pemilu 2024.','logo'=>null,'is_active'=>true,'sort_order'=>4],
            ['company'=>'KPU','position'=>'Pantarlih Pilkada Serentak 2024','location'=>null,'start_date'=>'2024-06-24','end_date'=>'2024-07-25','description'=>'Berpartisipasi sebagai Petugas Pemutakhiran Data Pemilih pada Pilkada Serentak 2024.','logo'=>null,'is_active'=>true,'sort_order'=>5],
            ['company'=>'KPU','position'=>'KPPS Pilkada Serentak 2024','location'=>null,'start_date'=>'2024-11-27','end_date'=>'2024-11-27','description'=>'Berpartisipasi sebagai petugas KPPS pada Pilkada Serentak 2024.','logo'=>null,'is_active'=>true,'sort_order'=>6],
            ['company'=>'Indomaret','position'=>'Store Crew','location'=>null,'start_date'=>'2025-01-01','end_date'=>'2025-05-31','description'=>'Membantu operasional toko, pelayanan pelanggan, penataan barang, dan aktivitas penjualan.','logo'=>null,'is_active'=>true,'sort_order'=>7],
            ['company'=>'Canary Coffee & Eatery','position'=>'Crew','location'=>null,'start_date'=>'2026-01-01','end_date'=>null,'description'=>'Membantu operasional coffee shop dan pelayanan pelanggan.','logo'=>null,'is_active'=>true,'sort_order'=>8],
        ]; foreach($experiences as $x) WorkExperience::updateOrCreate(['company'=>$x['company'],'position'=>$x['position']],$x);

        $organizations=[
            ['name'=>'Palang Merah Remaja (PMR)','position'=>'Divisi Humas','period'=>'2021','location'=>'SMK Negeri 1 Bumijawa','description'=>'Aktif dalam kegiatan organisasi PMR di lingkungan sekolah dan membantu bidang hubungan masyarakat.','achievement'=>null,'logo'=>null,'is_active'=>true,'sort_order'=>1],
            ['name'=>'UKM Kerohanian Islam UBSI Tegal','position'=>'Divisi Sosial dan Media','period'=>'2024 — 2025','location'=>'UBSI Tegal','description'=>'Berperan dalam kegiatan sosial dan pengelolaan media organisasi sebelum dipercaya menjadi ketua.','achievement'=>null,'logo'=>null,'is_active'=>true,'sort_order'=>2],
            ['name'=>'UKM Kerohanian Islam UBSI Tegal','position'=>'Ketua','period'=>'2025 — Sekarang','location'=>'UBSI Tegal','description'=>'Memimpin organisasi, mengoordinasikan anggota, serta mengelola kegiatan dan program kerja organisasi.','achievement'=>null,'logo'=>null,'is_active'=>true,'sort_order'=>3],
        ]; foreach($organizations as $x) Organization::updateOrCreate(['name'=>$x['name'],'position'=>$x['position']],$x);

        Skill::whereIn('category', ['Programming','Frontend','Framework'])->delete();
        $skills=[
            ['name'=>'PHP','category'=>'Web Development','level'=>75,'icon'=>null,'is_active'=>true,'sort_order'=>1],
            ['name'=>'Laravel','category'=>'Web Development','level'=>70,'icon'=>null,'is_active'=>true,'sort_order'=>2],
            ['name'=>'HTML','category'=>'Web Development','level'=>85,'icon'=>null,'is_active'=>true,'sort_order'=>3],
            ['name'=>'CSS','category'=>'Web Development','level'=>80,'icon'=>null,'is_active'=>true,'sort_order'=>4],
            ['name'=>'JavaScript','category'=>'Web Development','level'=>65,'icon'=>null,'is_active'=>true,'sort_order'=>5],
            ['name'=>'MySQL','category'=>'Database','level'=>70,'icon'=>null,'is_active'=>true,'sort_order'=>6],
            ['name'=>'Canva','category'=>'Design & Editing','level'=>85,'icon'=>null,'is_active'=>true,'sort_order'=>7],
            ['name'=>'Photo Editing','category'=>'Design & Editing','level'=>80,'icon'=>null,'is_active'=>true,'sort_order'=>8],
            ['name'=>'Graphic Design','category'=>'Design & Editing','level'=>75,'icon'=>null,'is_active'=>true,'sort_order'=>9],
            ['name'=>'Social Media Content','category'=>'Design & Editing','level'=>80,'icon'=>null,'is_active'=>true,'sort_order'=>10],
            ['name'=>'Basic UI/UX Design','category'=>'Design & Editing','level'=>65,'icon'=>null,'is_active'=>true,'sort_order'=>11],
            ['name'=>'Git & GitHub','category'=>'Tools','level'=>70,'icon'=>null,'is_active'=>true,'sort_order'=>12],
            ['name'=>'Visual Studio Code','category'=>'Tools','level'=>85,'icon'=>null,'is_active'=>true,'sort_order'=>13],
            ['name'=>'XAMPP','category'=>'Tools','level'=>80,'icon'=>null,'is_active'=>true,'sort_order'=>14],
            ['name'=>'Laragon','category'=>'Tools','level'=>75,'icon'=>null,'is_active'=>true,'sort_order'=>15],
        ]; foreach($skills as $x) Skill::create($x);

        // Sertifikat dan project sengaja tidak dibuat-buat. Tambahkan data asli dari Admin.
    }
}
