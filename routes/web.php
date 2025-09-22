<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\GoogleController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PaymentController;

Route::get('/debug-time', function () {
    return [
        'php_date_func'    => date('Y-m-d H:i:s'),
        'php_ini_tz'       => ini_get('date.timezone'),
        'laravel_now'      => now()->toDateTimeString(),
        'app_timezone'     => config('app.timezone'),
        'db_now'           => DB::select('select now() as now')[0]->now,
        'mysql_global_tz'  => DB::select('select @@global.time_zone as g, @@session.time_zone as s')[0],
    ];
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/dashboard/{user:slug}', [DashboardController::class, 'index'])
//     ->middleware('auth')
//     ->name('dashboard');

// Route::get('/dashboard/{user:slug}/list', [DiaryController::class, 'index'])
//     ->middleware('auth')
//     ->name('detail.catatan');
    
// Route::get('/dashboard/{user:slug}/detail/{day}', [DiaryController::class, 'catatan'])
// Route::get('/dashboard/{user:slug}/10-jan-2025', [DiaryController::class, 'catatan'])
//     ->middleware('auth')
//     ->name('detail.catatan.day');

// Route::get('/dashboard/{user:slug}/postdiary', [DiaryController::class, 'create'])
//     ->middleware('auth')
//     ->name('catatan.create');

Route::post('/catatan/store', [DiaryController::class, 'store'])
    ->middleware('auth')
    ->name('catatan.store');
Route::get('/catatan/detail', [DiaryController::class, 'detail'])
    ->middleware('auth')
    ->name('catatan.detail');
Route::get('/catatan/{slug}/edit/{id}', [DiaryController::class, 'edit'])
    ->middleware('auth')
    ->name('catatan.edit');
Route::put('/catatan/{slug}/{id}', [DiaryController::class, 'update'])
    ->middleware('auth')
    ->name('catatan.update');
Route::delete('/catatan/{slug}/{id}', [DiaryController::class, 'destroy'])
    ->middleware('auth')
    ->name('catatan.destroy');

// Route::get('/detail', function () {
//     return view('dashboard.details');
// });
// Route::get('/dashboard/{user:slug}/detail/{tahun:slug}-{bulan:slug}', [DashboardController::class, 'index'])
//     ->middleware('auth')
//     ->name('dashboard');

Route::get('/', function () {
    return view('landingpage.index');
});

Route::get('/dashboard/{user:slug}',[DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard2');
Route::get('/create/{slug}/{day_number}/{mood_id}',[DashboardController::class, 'showForm'])
    ->middleware('auth')
    ->name('test.showForm');
Route::post('/{slug}/day/{day_number}/mood/{mood_id}/answers', 
    [DashboardController::class, 'store'])
    ->middleware('auth')
    ->middleware('subscribed')
    ->name('answers.store');
Route::get('/pilih-mood/{slug}/{day_number}', [DashboardController::class, 'moodSelect'])
    ->middleware('auth')
    ->middleware('subscribed')
    ->name('moodSelect');
Route::get('/test-list/{slug}/{day_number}', [DashboardController::class, 'detail'])
    ->middleware('auth')
    ->name('list');
Route::get('/{slug}/day/{day_number}/answer/{ans_id}/edit', [DashboardController::class, 'edit'])
    ->middleware('auth')
    ->name('answer.edit');
Route::put('/{slug}/day/{day_number}/answer/{ans_id}', [DashboardController::class, 'update'])
    ->middleware('auth')
    ->name('answer.update');
Route::get('refleksi/{slug}', [DashboardController::class, 'refleksi'])
    ->middleware('auth')
    ->name('refleksi');
// Route::get('refleksi/{slug}/{number}', [DashboardController::class, 'refleksi'])
    // ->name('refleksi');

Route::get('/{slug}/testooooo', function($slug) {
        $user = User::where('slug', $slug)->firstOrFail();
        if (auth()->id() !== $user->id) abort(403);

        // hitung berapa hari yang sudah diisi
        $answeredDays = $user->answers()->distinct('day_id')->count('day_id');

        return view('test.refleksi_list', compact('user', 'answeredDays'));
    })->name('refleksi.index');

Route::post('/payment/create', [PaymentController::class, 'createPayment'])
    ->middleware('auth')
    ->name('payment.create');

Route::get('/pricing', function () {
    return view('landingpage.component.pricing');
})->middleware('auth')->name('pricing');
// routes/web.php
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/failed', [PaymentController::class, 'failed'])->name('payment.failed');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');

// Route::middleware([AuthCustom::class])->group(function () {
//     Route::get('/home', [DiaryController::class, 'home'])->name('home');
//     Route::get('/diary/select-mood', [DiaryController::class, 'selectMood'])->name('diary.selectMood');
//     Route::get('/diary/create', [DiaryController::class, 'create'])->name('diary.create');
//     Route::post('/diary/store', [DiaryController::class, 'store'])->name('diary.store');
// });
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });
