<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPenerbangan;
use App\Http\Controllers\AdminBandara;
use App\Http\Controllers\AdminKursiPenerbangan;
use App\Http\Controllers\AdminKelasPenerbangan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Step1Controller;
use App\Http\Controllers\Step2Controller;
use App\Http\Controllers\Step3Controller;
use App\Http\Controllers\Step4Controller;
use App\Http\Controllers\Step5Controller;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// No Middleware (Authentication routing)
Route::get('/login', [LoginController::class, 'get'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout' , [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'get'])->name('register.view');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// ADMIN ROUTING
Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'get'])->name('admin');
    Route::get('/admin/penerbangan', [AdminPenerbangan::class, 'get'])->name('admin.penerbangan');
    Route::post('/admin/penerbangan', [AdminPenerbangan::class, 'add'])->name('admin.penerbangan.add');
    Route::get('/admin/bandara', [AdminBandara::class, 'get'])->name('admin.bandara');
    Route::post('/admin/bandara', [AdminBandara::class, 'add'])->name('admin.bandara.add');
    Route::get('/admin/kelaspenerbangan', [AdminKelasPenerbangan::class, 'get'])->name('admin.kelaspenerbangan');
    Route::post('/admin/kelaspenerbangan', [AdminKelasPenerbangan::class, 'add'])->name('admin.kelaspenerbangan.add');

});

// USER ROUTING
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/step1', [Step1Controller::class, 'search'])->name('step1');
    Route::get('/step2', [Step2Controller::class, 'get'])->name('step2');
    Route::post('/step3', [Step3Controller::class, 'get'])->name('step3');
    Route::post('/step4', [Step4Controller::class, 'get'])->name('step4');
    Route::post('/step5', [Step5Controller::class, 'post'])->name('step5');
    Route::get('/step5/bayar', [Step5Controller::class, 'get'])->name('step5.bayar');
    Route::put('/final', [Step5Controller::class, 'update'])->name('home.finalized');
    Route::get('/history', [HistoryController::class, 'get'])->name('history');
    Route::get('/history/{id}', [HistoryController::class, 'getDetail'])->name('history.detail');
    Route::get('/news', [NewsController::class, 'get'])->name('news');
    Route::get('/news/{id}', [NewsController::class, 'getDetail'])->name('news.detail');
    Route::view('/settings', 'settings')->name('settings');
    Route::get('/settings/profile', [ProfileController::class, 'get'])->name('profile');
    Route::put('/settings/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::view('/settings/about', 'about')->name('settings.about');

});

// No Middleware (Utilities pages)
Route::view('/testcomp', 'testcomponent')->name('testcomp');
Route::view('/underconstruction', 'under_construction')->name('under_construction');
