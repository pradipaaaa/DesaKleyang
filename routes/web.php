<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GovernmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PotentialController;
use App\Http\Controllers\VillageProfileController;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

// ===========================
// Public / Frontend Routes
// ===========================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil-desa', [VillageProfileController::class, 'index'])->name('profile');
Route::get('/pemerintahan', [GovernmentController::class, 'index'])->name('government');
Route::get('/potensi-desa', [PotentialController::class, 'index'])->name('potential');
Route::get('/umkm', [PotentialController::class, 'umkm'])->name('umkm');
Route::get('/berita', [NewsController::class, 'index'])->name('news');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

// ===========================
// Auth Routes
// ===========================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===========================
// Admin Routes (Protected)
// ===========================
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // Village Profile
    Route::get('/profil-desa', [Admin\VillageProfileController::class, 'index'])->name('profile.index');
    Route::put('/profil-desa', [Admin\VillageProfileController::class, 'update'])->name('profile.update');

    // Village Officials
    Route::resource('perangkat-desa', Admin\VillageOfficialController::class, [
        'parameters' => ['perangkat-desa' => 'official'],
    ])->except(['show'])->names('officials');

    // Organization Structure
    Route::resource('struktur-organisasi', Admin\OrganizationStructureController::class, [
        'parameters' => ['struktur-organisasi' => 'organization'],
    ])->except(['show'])->names('organization');

    // Potentials
    Route::resource('potensi-desa', Admin\PotentialController::class, [
        'parameters' => ['potensi-desa' => 'potential'],
    ])->except(['show'])->names('potentials');

    // UMKMs
    Route::resource('umkm', Admin\UmkmController::class, [
        'parameters' => ['umkm' => 'umkm'],
    ])->except(['show'])->names('umkms');

    // News Categories
    Route::resource('kategori-berita', Admin\NewsCategoryController::class, [
        'parameters' => ['kategori-berita' => 'newsCategory'],
    ])->except(['show'])->names('news-categories');

    // News
    Route::resource('berita', Admin\NewsController::class, [
        'parameters' => ['berita' => 'news'],
    ])->except(['show'])->names('news');

    // Gallery Categories
    Route::resource('kategori-galeri', Admin\GalleryCategoryController::class, [
        'parameters' => ['kategori-galeri' => 'galleryCategory'],
    ])->except(['show'])->names('gallery-categories');

    // Gallery
    Route::resource('galeri', Admin\GalleryController::class, [
        'parameters' => ['galeri' => 'gallery'],
    ])->except(['show'])->names('gallery');

    // Visitor Messages
    Route::get('/pesan', [Admin\VisitorMessageController::class, 'index'])->name('messages.index');
    Route::get('/pesan/{message}', [Admin\VisitorMessageController::class, 'show'])->name('messages.show');
    Route::delete('/pesan/{message}', [Admin\VisitorMessageController::class, 'destroy'])->name('messages.destroy');
});
