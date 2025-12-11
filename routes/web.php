<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Аутентификация
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Личный кабинет (только для авторизованных)
Route::middleware(['auth'])->prefix('profile')->group(function () {
    Route::get('/main', [ProfileController::class, 'index'])->name('profile'); // использует index.blade.php
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('profile.password.change');
});


// НОВОСТИ:
Route::get('/news', function () {
    return view('news');
})->name('news');

// КАТАЛОГ:

Route::get('/catalog/{category}', [CatalogController::class, 'show'])->name('catalog.category');

Route::post('/rental/create', [RentalController::class, 'create'])->name('rental.create');

// ПРОФИЛЬ
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
// ПАРТНЕРАМ
Route::get('/partners', function () {
    return view('partners');
})->name('partners');
//КОНТАКТЫ
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');
//ОТЗывы
Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

Route::post('/profile/rentals/clear', [ProfileController::class, 'clearRentals'])->name('profile.rentals.clear');

/// Админка
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('admin.toggle.admin');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/rentals', [AdminController::class, 'rentals'])->name('admin.rentals');

    // Товары
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::post('/products', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::delete('/products/{product}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
});
