<?php

use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC PORTFOLIO
|--------------------------------------------------------------------------
|
| Semua halaman portfolio dapat diakses pengunjung tanpa login.
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/education', [PageController::class, 'education'])->name('education');
Route::get('/experience', [PageController::class, 'experience'])->name('experience');
Route::get('/organization', [PageController::class, 'organization'])->name('organization');
Route::get('/skills', [PageController::class, 'skills'])->name('skills');
Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
|
| Route login dibuat bernama "login" karena middleware auth Laravel
| secara default akan mengarahkan user yang belum login ke route ini.
|
*/

Route::get('/admin/login', fn () => view('admin.login'))
    ->middleware('guest')
    ->name('login');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|
| Hanya area /admin yang membutuhkan autentikasi.
| Pengunjung portfolio tidak perlu login.
|
*/

Route::get('/admin', fn () => redirect()->route('admin.dashboard'))
    ->name('admin.entry');

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    Route::post('/login', [DashboardController::class, 'login'])
        ->middleware('guest')
        ->name('login.store');


    /*
    |--------------------------------------------------------------------------
    | AREA ADMIN YANG SUDAH LOGIN
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth')->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Logout
        Route::post('/logout', [DashboardController::class, 'logout'])
            ->name('logout');


        /*
        |--------------------------------------------------------------------------
        | CONTENT MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::get('/content/{type}', [ContentController::class, 'index'])
            ->name('content.index');

        Route::get('/content/{type}/create', [ContentController::class, 'create'])
            ->name('content.create');

        Route::post('/content/{type}', [ContentController::class, 'store'])
            ->name('content.store');

        Route::get('/content/{type}/{id}/edit', [ContentController::class, 'edit'])
            ->name('content.edit');

        Route::put('/content/{type}/{id}', [ContentController::class, 'update'])
            ->name('content.update');

        Route::delete('/content/{type}/{id}', [ContentController::class, 'destroy'])
            ->name('content.destroy');


        /*
        |--------------------------------------------------------------------------
        | MESSAGES
        |--------------------------------------------------------------------------
        */

        Route::patch('/messages/{id}/read', [ContentController::class, 'readMessage'])
            ->name('messages.read');
    });
});