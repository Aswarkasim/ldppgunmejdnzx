<?php

use App\Http\Controllers\AdminAkunController;
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
use App\Http\Controllers\AdminVerifikasiController;
use App\Http\Controllers\AdminBidangStudiController;
use App\Http\Controllers\AdminKelengkapanController;
use App\Http\Controllers\AdminCategoryPostController;
use App\Http\Controllers\AdminConfigurationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminJenisPpgController;
use App\Http\Controllers\AdminKelasProgramController;
use App\Http\Controllers\AdminMahasiswaController;
use App\Http\Controllers\AdminNotifController;
use App\Http\Controllers\AdminPeriodeController;
use App\Http\Controllers\AdminPetunjukController;
use App\Http\Controllers\AdminRegisterSettingController;
use App\Http\Controllers\AdminTimelineController;

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

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/petunjuk', [HomeController::class, 'petunjuk']);
    Route::get('/timeline', [HomeController::class, 'timeline']);
    Route::get('/helpdesk', [HomeController::class, 'helpdesk']);
});




Route::prefix('/auth')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::get('/register', [AdminAuthController::class, 'register']);
    Route::post('/doRegister', [AdminAuthController::class, 'doRegister']);
    Route::get('/logout', [AdminAuthController::class, 'logout']);
});


Route::prefix('/account')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('account.dashboard');
    Route::get('/dashboard/status', [AdminDashboardController::class, 'changeStatus']);
    Route::get('/dashboard/config/periode/{id}', [AdminDashboardController::class, 'periodeLD']);
    Route::get('/periode', [AdminDashboardController::class, 'periodeActive']);


    Route::get('/notif', [AdminNotifController::class, 'index']);

    Route::get('/akun', [AdminAkunController::class, 'index']);
    Route::post('/akun/save', [AdminAkunController::class, 'save']);



    Route::put('/setting/register/update', [AdminRegisterSettingController::class, 'update']);

    // Route::middleware('role:superadmin');
    Route::get('/konfigurasi', [AdminConfigurationController::class, 'index']);
    Route::put('/konfigurasi/update', [AdminConfigurationController::class, 'update']);

    Route::resource('/kelengkapan', AdminKelengkapanController::class);

    Route::put('/berkas/upload', [AdminBerkasController::class, 'upload']);
    Route::get('/berkas/cetak', [AdminBerkasController::class, 'cetakBukti']);
    Route::resource('/berkas', AdminBerkasController::class);


    Route::resource('/timeline', AdminTimelineController::class);
    Route::resource('/petunjuk', AdminPetunjukController::class);

    Route::resource('/banner', AdminBannerController::class);
    Route::post('/user/province', [AdminUserController::class, 'addProvince']);
    Route::get('/user/delete/province/{id}', [AdminUserController::class, 'deleteProvince']);
    Route::resource('/user', AdminUserController::class);

    Route::prefix('/master')->middleware('role:superadmin')->group(function () {
        Route::resource('/periode', AdminPeriodeController::class);
        Route::resource('/bidangstudi', AdminBidangStudiController::class);
        Route::resource('/jenisppg', AdminJenisPpgController::class);
        Route::resource('/kelasprogram', AdminKelasProgramController::class);
        // Route::resource('/prodi', AdminProdiController::class);


    });

    Route::prefix('/verifikasi')->group(function () {
        Route::get('/', [AdminVerifikasiController::class, 'index']);
        Route::get('/all/{id}', [AdminVerifikasiController::class, 'verifikasiAll']);
        Route::get('/biodata/{id}', [AdminVerifikasiController::class, 'biodata']);
        Route::get('/show/{id}', [AdminVerifikasiController::class, 'show']);
        Route::get('/validasi/{id}', [AdminVerifikasiController::class, 'validasi']);
        Route::post('/invalid/{id}', [AdminVerifikasiController::class, 'invalid']);
        Route::get('/list/province/{id}', [AdminVerifikasiController::class, 'province']);
    });

    Route::prefix('/mahasiswa')->group(function () {
        Route::get('/', [AdminMahasiswaController::class, 'index']);
        Route::get('/export', [AdminMahasiswaController::class, 'exportExcel']);
        Route::post('/import', [AdminMahasiswaController::class, 'import']);
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
        Route::put('/pasfoto', [AdminProfileController::class, 'pasfoto']);
        Route::put('/rekening', [AdminProfileController::class, 'updateRekening']);
    });
});




Route::get('/toast', function () {
    Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);

    return view('welcome');
});


Route::get('/get-regency/{province_id?}', [AdminProfileController::class, 'getCity']);
Route::get('/get-periode/{jenis_ppg_id?}', [AdminDashboardController::class, 'getPeriode']);
