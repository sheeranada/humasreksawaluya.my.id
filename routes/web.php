<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SdmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FarmasiController;
use App\Http\Controllers\PxRajalController;
use App\Http\Controllers\SarprasController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UpfHistoryController;
use App\Http\Controllers\RuangTungguController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\PasienPribadiController;
use App\Http\Controllers\AnalisaPxrajalController;

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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
->middleware('auth')
->group(function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::get('administrasi', [
            AdministrasiController::class,
            'index',
        ])->name('administrasi.index');
        Route::post('administrasi', [
            AdministrasiController::class,
            'store',
        ])->name('administrasi.store');
        Route::get('administrasi/create', [
            AdministrasiController::class,
            'create',
        ])->name('administrasi.create');
        Route::get('administrasi/{administrasi}', [
            AdministrasiController::class,
            'show',
        ])->name('administrasi.show');
        Route::get('administrasi/{administrasi}/edit', [
            AdministrasiController::class,
            'edit',
        ])->name('administrasi.edit');
        Route::put('administrasi/{administrasi}', [
            AdministrasiController::class,
            'update',
        ])->name('administrasi.update');
        Route::delete('administrasi/{administrasi}', [
            AdministrasiController::class,
            'destroy',
        ])->name('administrasi.destroy');

        Route::get('farmasi', [FarmasiController::class, 'index'])->name(
            'farmasi.index'
        );
        Route::post('farmasi', [FarmasiController::class, 'store'])->name(
            'farmasi.store'
        );
        Route::get('farmasi/create', [
            FarmasiController::class,
            'create',
        ])->name('farmasi.create');
        Route::get('farmasi/{farmasi}', [
            FarmasiController::class,
            'show',
        ])->name('farmasi.show');
        Route::get('farmasi/{farmasi}/edit', [
            FarmasiController::class,
            'edit',
        ])->name('farmasi.edit');
        Route::put('farmasi/{farmasi}', [
            FarmasiController::class,
            'update',
        ])->name('farmasi.update');
        Route::delete('farmasi/{farmasi}', [
            FarmasiController::class,
            'destroy',
        ])->name('farmasi.destroy');

        Route::get('pelayanan', [PelayananController::class, 'index'])->name(
            'pelayanan.index'
        );
        Route::post('pelayanan', [PelayananController::class, 'store'])->name(
            'pelayanan.store'
        );
        Route::get('pelayanan/create', [
            PelayananController::class,
            'create',
        ])->name('pelayanan.create');
        Route::get('pelayanan/{pelayanan}', [
            PelayananController::class,
            'show',
        ])->name('pelayanan.show');
        Route::get('pelayanan/{pelayanan}/edit', [
            PelayananController::class,
            'edit',
        ])->name('pelayanan.edit');
        Route::put('pelayanan/{pelayanan}', [
            PelayananController::class,
            'update',
        ])->name('pelayanan.update');
        Route::delete('pelayanan/{pelayanan}', [
            PelayananController::class,
            'destroy',
        ])->name('pelayanan.destroy');

        Route::get('px-rajal', [PxRajalController::class, 'index'])->name(
            'px-rajal.index'
        );
        Route::post('px-rajal', [PxRajalController::class, 'store'])->name(
            'px-rajal.store'
        );
        Route::get('px-rajal/create', [
            PxRajalController::class,
            'create',
        ])->name('px-rajal.create');
        Route::get('px-rajal/{pxRajal}', [
            PxRajalController::class,
            'show',
        ])->name('px-rajal.show');
        Route::get('px-rajal/{pxRajal}/edit', [
            PxRajalController::class,
            'edit',
        ])->name('px-rajal.edit');
        Route::put('px-rajal/{pxRajal}', [
            PxRajalController::class,
            'update',
        ])->name('px-rajal.update');
        Route::delete('px-rajal/{pxRajal}', [
            PxRajalController::class,
            'destroy',
        ])->name('px-rajal.destroy');

        Route::get('ruang-tunggu', [
            RuangTungguController::class,
            'index',
        ])->name('ruang-tunggu.index');
        Route::post('ruang-tunggu', [
            RuangTungguController::class,
            'store',
        ])->name('ruang-tunggu.store');
        Route::get('ruang-tunggu/create', [
            RuangTungguController::class,
            'create',
        ])->name('ruang-tunggu.create');
        Route::get('ruang-tunggu/{ruangTunggu}', [
            RuangTungguController::class,
            'show',
        ])->name('ruang-tunggu.show');
        Route::get('ruang-tunggu/{ruangTunggu}/edit', [
            RuangTungguController::class,
            'edit',
        ])->name('ruang-tunggu.edit');
        Route::put('ruang-tunggu/{ruangTunggu}', [
            RuangTungguController::class,
            'update',
        ])->name('ruang-tunggu.update');
        Route::delete('ruang-tunggu/{ruangTunggu}', [
            RuangTungguController::class,
            'destroy',
        ])->name('ruang-tunggu.destroy');

        Route::get('sarpras', [SarprasController::class, 'index'])->name(
            'sarpras.index'
        );
        Route::post('sarpras', [SarprasController::class, 'store'])->name(
            'sarpras.store'
        );
        Route::get('sarpras/create', [
            SarprasController::class,
            'create',
        ])->name('sarpras.create');
        Route::get('sarpras/{sarpras}', [
            SarprasController::class,
            'show',
        ])->name('sarpras.show');
        Route::get('sarpras/{sarpras}/edit', [
            SarprasController::class,
            'edit',
        ])->name('sarpras.edit');
        Route::put('sarpras/{sarpras}', [
            SarprasController::class,
            'update',
        ])->name('sarpras.update');
        Route::delete('sarpras/{sarpras}', [
            SarprasController::class,
            'destroy',
        ])->name('sarpras.destroy');

        Route::get('sdm', [SdmController::class, 'index'])->name('sdm.index');
        Route::post('sdm', [SdmController::class, 'store'])->name('sdm.store');
        Route::get('sdm/create', [SdmController::class, 'create'])->name(
            'sdm.create'
        );
        Route::get('sdm/{sdm}', [SdmController::class, 'show'])->name(
            'sdm.show'
        );
        Route::get('sdm/{sdm}/edit', [SdmController::class, 'edit'])->name(
            'sdm.edit'
        );
        Route::put('sdm/{sdm}', [SdmController::class, 'update'])->name(
            'sdm.update'
        );
        Route::delete('sdm/{sdm}', [SdmController::class, 'destroy'])->name(
            'sdm.destroy'
        );
        Route::controller(DataPasienController::class)->group(function () {
            Route::get('/data_pasien_rajal', 'tampilkan_rajal')->name('data_px_rajal');
        });
        Route::controller(AnalisaPxrajalController::class)->group(function () {
            Route::get('/analisa_pxrajal', 'index');
            Route::get('/analisa_pxrajal/hapus/{id}', 'hapus');
            route::get('/report_rajal','laporan')->name('laporan');
        });
    });

Route::controller(DataPasienController::class)->group(function () {
    Route::get('/pxrajal/survey/{no_upf}','survey_rajal')->name('survey');
    Route::post('/pxrajal/simpan','rajalsimpan')->name('rajal_simpan');
});

Route::get('/oops', function () {
    return view('etc.error');
});
Route::get('/rsreksawaluya.com', function () {
    return redirect()->away('https://rsreksawaluya.com');
});
