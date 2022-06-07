<?php

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminProdiController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminBerkasController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminAngkatanController;
use App\Http\Controllers\AdminVerifikasiController;
use App\Http\Controllers\AdminBidangStudiController;
use App\Http\Controllers\AdminKelengkapanController;
use App\Http\Controllers\AdminCategoryPostController;
use App\Http\Controllers\AdminConfigurationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);



Route::prefix('/auth')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::get('/register', [AdminAuthController::class, 'register']);
    Route::post('/doRegister', [AdminAuthController::class, 'doRegister']);
    Route::get('/logout', [AdminAuthController::class, 'logout']);
});


Route::prefix('/account')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    });

    Route::resource('/user', AdminUserController::class);

    Route::get('/konfigurasi', [AdminConfigurationController::class, 'index']);
    Route::put('/konfigurasi/update', [AdminConfigurationController::class, 'update']);

    Route::resource('/kelengkapan', AdminKelengkapanController::class);

    Route::put('/berkas/upload', [AdminBerkasController::class, 'upload']);
    Route::resource('/berkas', AdminBerkasController::class);

    Route::resource('/banner', AdminBannerController::class);

    Route::prefix('/master')->group(function () {
        Route::resource('/angkatan', AdminAngkatanController::class);
        Route::resource('/bidangstudi', AdminBidangStudiController::class);
        // Route::resource('/prodi', AdminProdiController::class);
    });

    Route::prefix('/verifikasi')->group(function () {
        Route::get('/', [AdminVerifikasiController::class, 'index']);
        Route::get('/show/{id}', [AdminVerifikasiController::class, 'show']);
        Route::get('/validasi/{id}', [AdminVerifikasiController::class, 'validasi']);
    });


    Route::prefix('/posts')->group(function () {
        Route::resource('/post', AdminPostController::class);
        Route::resource('/kategori', AdminCategoryPostController::class);
    });

    Route::prefix('/profile')->group(function () {
        Route::get('/', [AdminProfileController::class, 'index']);
        Route::put('/datadiri', [AdminProfileController::class, 'updateDataDiri']);
        Route::put('/instansi', [AdminProfileController::class, 'updateInstansi']);
        Route::put('/pendidikan', [AdminProfileController::class, 'updatePendidikan']);
        Route::put('/keluarga', [AdminProfileController::class, 'updateKeluarga']);
    });
});

Route::prefix('/home')->group(function () {
    // Route::resource('/mitra', HomeMitraController::class);;
    // Route::resource('/layanan', HomeLayananController::class);;
});


Route::get('/toast', function () {
    Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);

    return view('welcome');
});
