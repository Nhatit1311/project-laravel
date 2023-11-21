<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LichChieuController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index']);
Route::get('/admin-rocker', [TestController::class, 'indexRocker']);
// register
Route::get('/register', [CustomerController::class, 'viewRegister']);
Route::post('/register', [CustomerController::class, 'actionRegister']);
// login
Route::get('/login', [CustomerController::class, 'viewLogin']);
Route::post('/login', [CustomerController::class, 'actionLogin']);
Route::get('/active/{hash}', [CustomerController::class, 'actionActive']);
// reset password
Route::get('/reset-password', [CustomerController::class, 'viewResetPassword']);
Route::post('/reset-password', [CustomerController::class, 'actionResetPassword']);
// update password
Route::get('/update-password/{hash}', [CustomerController::class, 'viewUpdatePassword']);
Route::post('/update-password', [CustomerController::class, 'actionUpdatePassword']);

Route::group(['prefix' => '/admin'], function() {
    // config
    Route::group(['prefix' => '/cau-hinh'], function() {
        Route::get('/index', [ConfigController::class, 'index']);
        Route::get('/create', [ConfigController::class, 'store']);
        Route::get('/data', [ConfigController::class, 'getData']);
    });

    Route::group(['prefix' => '/phong'], function() {
        Route::get('/index', [PhongController::class, 'index']);
        // lấy dữ liệu
        Route::get('/data', [PhongController::class, 'getData']);
        // thêm dữ liệu
        Route::post('/index', [PhongController::class, 'store']);
        // thay đổi trạng thái
        Route::get('/change-status/{id}', [PhongController::class, 'changeStatus']);
        // xoá dữ liệU
        Route::get('/delete/{id}', [PhongController::class, 'destroy']);
        // cập nhậT dữ liệu
        Route::get('/edit/{id}', [PhongController::class, 'edit']);
        Route::post('/update', [PhongController::class, 'update']);

        Route::get('/data-ghe/{id_phong}', [PhongController::class, 'getDataGhe']);

    });

    Route::group(['prefix' => '/phim'], function() {
        Route::get('/index', [PhimController::class, 'index']);
        Route::get('/data', [PhimController::class, 'getData']);
        Route::post('/create', [PhimController::class, 'store']);

        Route::get('/index-vue', [PhimController::class, 'indexVue']);
        Route::post('/create-vue', [PhimController::class, 'storeVue']);
        Route::post('/delete', [PhimController::class, 'destroy']);
        Route::post('/update', [PhongController::class, 'update']);
    });

    Route::group(['prefix' => '/lich-chieu'], function() {
        Route::get('/index', [LichChieuController::class, 'index']);
        Route::post('/create', [LichChieuController::class, 'store']);

        Route::get('/tao-mot-buoi', [LichChieuController::class, 'viewTaoMotBuoi']);
    });

    Route::group(['prefix' => '/customer'], function() {
        Route::get('/index', [CustomerController::class, 'index']);
    });
});


// Route::group(['prefix' => 'laravel-filemanager'], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });

