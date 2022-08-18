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
use App\Http\Controllers\AdminDosenController;
use App\Http\Controllers\AdminGeneralController;
use App\Http\Controllers\AdminJenisPpgController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminKelasPesertaController;
use App\Http\Controllers\AdminKelasProgramController;
use App\Http\Controllers\AdminMahasiswaController;
use App\Http\Controllers\AdminMatakuliahController;
use App\Http\Controllers\AdminNotifController;
use App\Http\Controllers\AdminPenilaianController;
use App\Http\Controllers\AdminPeriodeController;
use App\Http\Controllers\AdminPetunjukController;
use App\Http\Controllers\AdminRegisterSettingController;
use App\Http\Controllers\AdminTimelineController;
use App\Http\Controllers\DosenProfileController;
use App\Http\Controllers\MahasiswaPpiController;

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
    Route::put('/dashboard/periode/ppi/update', [AdminDashboardController::class, 'updatePpiPeriode']);
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

    Route::prefix('/user')->middleware(['role:superadmin'])->group(function () {
        Route::get('/mahasiswa', [AdminUserController::class, 'mahasiswa']);
        Route::get('/admin', [AdminUserController::class, 'admin']);
        Route::put('/periode', [AdminUserController::class, 'periode']);
        Route::get('/export', [AdminUserController::class, 'exportExcel']);
        Route::get('/delete/province/{id}', [AdminUserController::class, 'deleteProvince']);

        Route::post('/kelas', [AdminUserController::class, 'addKelas']);
        Route::get('/kelas/delete/{id}', [AdminUserController::class, 'deleteKelas']);
    });
    Route::resource('/user', AdminUserController::class);

    Route::prefix('/master')->middleware('role:superadmin')->group(function () {
        Route::resource('/periode', AdminPeriodeController::class);
        Route::resource('/bidangstudi', AdminBidangStudiController::class);
        Route::resource('/jenisppg', AdminJenisPpgController::class);
        Route::resource('/kelasprogram', AdminKelasProgramController::class);
        Route::resource('/matakuliah', AdminMatakuliahController::class);

        // Route::resource('/prodi', AdminProdiController::class);
    });

    Route::prefix('/kelas')->middleware('role:superadmin')->group(function () {
        Route::post('/import', [AdminKelasController::class, 'import']);
        Route::get('/download', [AdminKelasController::class, 'downloadFormat']);
        Route::post('/peserta/create', [AdminKelasPesertaController::class, 'create']);
        Route::post('/peserta/import', [AdminKelasPesertaController::class, 'import']);
        Route::get('/peserta/download', [AdminKelasPesertaController::class, 'downloadFormat']);
        Route::get('/peserta/delete/{id}', [AdminKelasPesertaController::class, 'delete']);
    });
    Route::resource('/kelas', AdminKelasController::class);


    Route::prefix('/verifikasi')->group(function () {
        Route::get('/', [AdminVerifikasiController::class, 'index']);
        Route::get('/all/{id}', [AdminVerifikasiController::class, 'verifikasiAll']);
        Route::get('/biodata/{id}', [AdminVerifikasiController::class, 'biodata']);
        Route::get('/show/{id}', [AdminVerifikasiController::class, 'show']);
        Route::get('/validasi/{id}', [AdminVerifikasiController::class, 'validasi']);
        Route::post('/invalid/{id}', [AdminVerifikasiController::class, 'invalid']);
        Route::get('/list/province/{id}', [AdminVerifikasiController::class, 'province']);
    });



    Route::prefix('/dosen')->group(function () {
        Route::get('/', [AdminDosenController::class, 'index']);
        Route::get('/detail/{id}', [AdminDosenController::class, 'detail']);
    });
    Route::resource('/dosen', AdminDosenController::class);


    Route::prefix('/mahasiswa')->group(function () {
        Route::get('/sinkron', [AdminMahasiswaController::class, 'sinkron']);
        // Route::post('/destroy/{id}', [AdminMahasiswaController::class, 'destroy']);
        // Route::get('/show/{id}', [AdminMahasiswaController::class, 'show']);
        Route::get('/biodata/{id}', [AdminMahasiswaController::class, 'biodata']);
        Route::post('/biodata/bukti/upload', [AdminMahasiswaController::class, 'uploadBuktiMengundurkanDiri']);
        Route::put('/biodata/keaktifan/alasan', [AdminMahasiswaController::class, 'updateAlasan']);
        Route::get('/download', [AdminMahasiswaController::class, 'downloadFormat']);
        Route::get('/export', [AdminMahasiswaController::class, 'exportExcel']);
        Route::post('/import', [AdminMahasiswaController::class, 'import']);
        Route::get('/kemendikbud', [AdminMahasiswaController::class, 'kemendikbud']);
        Route::get('/kemenag', [AdminMahasiswaController::class, 'kemenag']);
        Route::get('/notregisted', [AdminMahasiswaController::class, 'notRegis']);
        Route::get('/notinverified', [AdminMahasiswaController::class, 'notInVerified']);
        Route::get('/update/periode', [AdminMahasiswaController::class, 'updatePeriode']);
        Route::get('/update/namebyid', [AdminMahasiswaController::class, 'updateNameById']);
    });
    Route::resource('/mahasiswa', AdminMahasiswaController::class);


    Route::prefix('/posts')->group(function () {
        Route::resource('/post', AdminPostController::class);
        Route::resource('/kategori', AdminCategoryPostController::class);
    });

    // ============DOSEN====================
    Route::prefix('/user/dosen')->middleware('role:dosen')->group(function () {
        Route::get('/', [DosenProfileController::class, 'index']);
        Route::put('/datadiri', [DosenProfileController::class, 'updateDataDiri']);
        Route::put('/instansi', [DosenProfileController::class, 'updateInstansi']);
        Route::put('/pendidikan', [DosenProfileController::class, 'updatePendidikan']);
        Route::put('/rekening', [DosenProfileController::class, 'updateRekening']);
        Route::put('/pasfoto', [DosenProfileController::class, 'pasfoto']);
    });




    // ============== ADMIN KELAS ================

    Route::prefix('/penilaian')->group(function () {
        Route::get('/kelas', [AdminPenilaianController::class, 'kelas']);
        // Route::get('/kelas/mahasiswa/{id}', [AdminPenilaianController::class, 'mahasiswa']);
        Route::get('/kelas/matakuliah/{id}', [AdminPenilaianController::class, 'matakuliah']);
        Route::get('/matakuliah/mahasiswa/{id}', [AdminPenilaianController::class, 'mahasiswa']);
        Route::get('/nilai/update', [AdminPenilaianController::class, 'updateNilai']);
        Route::get('/mahasiswa/keaktifan', [AdminPenilaianController::class, 'updateStatusMahasiswa']);
        Route::get('/show/{id}', [AdminPenilaianController::class, 'show']);
        Route::post('/import', [AdminPenilaianController::class, 'importNilai']);
        Route::get('/download', [AdminPenilaianController::class, 'downloadFormat']);
    });

    Route::prefix('/admin')->middleware('role:admin')->group(function () {
        Route::get('/matakuliah', [AdminGeneralController::class, 'matakuliah']);
    });


    //================ MAHASISWA ========================
    Route::prefix('/profile')->middleware('role:mahasiswa')->group(function () {
        Route::get('/', [AdminProfileController::class, 'index']);
        Route::put('/datadiri', [AdminProfileController::class, 'updateDataDiri']);
        Route::put('/instansi', [AdminProfileController::class, 'updateInstansi']);
        Route::put('/pendidikan', [AdminProfileController::class, 'updatePendidikan']);
        Route::put('/keluarga', [AdminProfileController::class, 'updateKeluarga']);
        Route::put('/pasfoto', [AdminProfileController::class, 'pasfoto']);
        Route::put('/rekening', [AdminProfileController::class, 'updateRekening']);
        Route::get('/biodata', [AdminProfileController::class, 'biodata']);
    });

    Route::prefix('/ppi')->group(function () {
        Route::get('/', [MahasiswaPpiController::class, 'index']);
        Route::put('/edit', [MahasiswaPpiController::class, 'edit']);
        Route::get('/cetak', [MahasiswaPpiController::class, 'cetakSurat']);
    });


    //================ DOSEN ========================
    Route::prefix('/dosen')->middleware('role:dosen')->group(function () {
        Route::prefix('/profile')->group(function () {
            Route::get('/', [DosenProfileController::class, 'index']);
            Route::put('/datadiri', [DosenProfileController::class, 'updateDataDiri']);
            Route::put('/instansi', [DosenProfileController::class, 'updateInstansi']);
            Route::put('/pendidikan', [DosenProfileController::class, 'updatePendidikan']);
            Route::put('/keluarga', [DosenProfileController::class, 'updateKeluarga']);
            Route::put('/pasfoto', [DosenProfileController::class, 'pasfoto']);
            Route::put('/rekening', [DosenProfileController::class, 'updateRekening']);
            Route::get('/biodata', [DosenProfileController::class, 'biodata']);
        });
    });
});




Route::get('/toast', function () {
    Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);

    return view('welcome');
});


Route::get('/get-regency/{province_id?}', [AdminProfileController::class, 'getCity']);
Route::get('/get-periode/{jenis_ppg_id?}', [AdminDashboardController::class, 'getPeriode']);
