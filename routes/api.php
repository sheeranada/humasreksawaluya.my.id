<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SdmController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\FarmasiController;
use App\Http\Controllers\Api\PxRajalController;
use App\Http\Controllers\Api\SarprasController;
use App\Http\Controllers\Api\PelayananController;
use App\Http\Controllers\Api\PxRajalSdmController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RuangTungguController;
use App\Http\Controllers\Api\AdministrasiController;
use App\Http\Controllers\Api\PxRajalSarprasController;
use App\Http\Controllers\Api\PxRajalFarmasiController;
use App\Http\Controllers\Api\PxRajalPelayananController;
use App\Http\Controllers\Api\PxRajalRuangTungguController;
use App\Http\Controllers\Api\PxRajalAdministrasiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('administrasi', AdministrasiController::class);

        Route::apiResource('farmasi', FarmasiController::class);

        Route::apiResource('pelayanan', PelayananController::class);

        Route::apiResource('px-rajal', PxRajalController::class);

        // PxRajal Sarpras
        Route::get('/px-rajal/{pxRajal}/sarpras', [
            PxRajalSarprasController::class,
            'index',
        ])->name('px-rajal.sarpras.index');
        Route::post('/px-rajal/{pxRajal}/sarpras', [
            PxRajalSarprasController::class,
            'store',
        ])->name('px-rajal.sarpras.store');

        // PxRajal Sdm
        Route::get('/px-rajal/{pxRajal}/sdm', [
            PxRajalSdmController::class,
            'index',
        ])->name('px-rajal.sdm.index');
        Route::post('/px-rajal/{pxRajal}/sdm', [
            PxRajalSdmController::class,
            'store',
        ])->name('px-rajal.sdm.store');

        // PxRajal Administrasi
        Route::get('/px-rajal/{pxRajal}/administrasi', [
            PxRajalAdministrasiController::class,
            'index',
        ])->name('px-rajal.administrasi.index');
        Route::post('/px-rajal/{pxRajal}/administrasi', [
            PxRajalAdministrasiController::class,
            'store',
        ])->name('px-rajal.administrasi.store');

        // PxRajal Farmasis
        Route::get('/px-rajal/{pxRajal}/farmasi', [
            PxRajalFarmasiController::class,
            'index',
        ])->name('px-rajal.farmasi.index');
        Route::post('/px-rajal/{pxRajal}/farmasi', [
            PxRajalFarmasiController::class,
            'store',
        ])->name('px-rajal.farmasi.store');

        // PxRajal Pelayanan
        Route::get('/px-rajal/{pxRajal}/pelayanan', [
            PxRajalPelayananController::class,
            'index',
        ])->name('px-rajal.pelayanan.index');
        Route::post('/px-rajal/{pxRajal}/pelayanan', [
            PxRajalPelayananController::class,
            'store',
        ])->name('px-rajal.pelayanan.store');

        // PxRajal Ruang Tunggu
        Route::get('/px-rajal/{pxRajal}/ruang-tunggu', [
            PxRajalRuangTungguController::class,
            'index',
        ])->name('px-rajal.ruang-tunggu.index');
        Route::post('/px-rajal/{pxRajal}/ruang-tunggu', [
            PxRajalRuangTungguController::class,
            'store',
        ])->name('px-rajal.ruang-tunggu.store');

        Route::apiResource('ruang-tunggu', RuangTungguController::class);

        Route::apiResource('sarpras', SarprasController::class);

        Route::apiResource('sdm', SdmController::class);
    });
