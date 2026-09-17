# Update Portfolio Adi Prasetyo

## Perubahan utama

- Frontend tidak lagi menumpuk seluruh konten di halaman Home.
- Home menjadi halaman landing/overview.
- Halaman publik dipisah menjadi:
  - `/`
  - `/about`
  - `/education`
  - `/experience`
  - `/organization`
  - `/skills`
  - `/certificates`
  - `/projects`
  - `/projects/{slug}`
  - `/contact`
- Pengunjung publik tidak perlu login.
- Hanya area `/admin` yang menggunakan autentikasi.
- CSS dipisah:
  - `app.css` = reset/global/shared
  - `frontend.css` = seluruh portfolio publik
  - `backend.css` = dashboard admin + login
- CSS public dan source Vite dibuat konsisten.
- Seluruh tampilan menggunakan tema cream/off-white/warm neutral; tidak ada background dark.
- Navbar frontend responsif dan mobile menu diperbaiki.
- Sidebar admin responsif dan mobile toggle diperbaiki.
- Admin dashboard, tabel, form, login, upload sertifikat dibuat lebih rapi.
- Upload sertifikat tetap mendukung PDF/JPG/JPEG/PNG/WEBP/GIF sampai 10 MB.
- Detail project tetap mendukung thumbnail, gallery, teknologi, GitHub, dan demo.
- Slug project dibuat aman dari duplikasi.
- Syntax PHP dan kompilasi Blade sudah dicek.

## Setelah mengekstrak project

Pastikan `.env` memakai database kamu, lalu jalankan bila diperlukan:

```bash
composer install
php artisan migrate --seed
php artisan storage:link
```

Untuk asset Vite/source CSS:

```bash
npm install
npm run build
```

Project juga tetap menggunakan asset CSS langsung dari `public/assets/css`, jadi halaman portfolio tidak bergantung pada Vite dev server untuk tampil.

## Login admin awal

```text
Email    : admin@adiprasetyo.dev
Password : password
```

Sebaiknya password default diganti setelah login.
