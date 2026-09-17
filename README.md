# Adi Prasetyo Portfolio — Ready Project

Laravel 12 portfolio + admin CMS.

## Requirements
- PHP 8.2+
- MySQL 8 / XAMPP
- Composer (only needed if vendor is removed)
- Node.js is not required to run this ready-to-run package; CSS/JS production assets are already included.

## First run
1. Extract this folder.
2. Create a MySQL database named `db_portofolio`.
3. Check `.env` (default: root with empty password).
4. Run:

```powershell
php artisan migrate --seed
php artisan storage:link
php artisan optimize:clear
php artisan serve
```

Open `http://127.0.0.1:8000`.

## Admin
- URL: `/admin/login`
- Email: `admin@adiprasetyo.dev`
- Password: `password`

## Frontend
Content is read from MySQL. Education, work experience, organizations, skills, certificates, and projects have admin CRUD. Certificates/projects are intentionally empty until real data is added; no fake certificates/projects are fabricated.

Profile and cover assets are included in `public/assets/images/`.
