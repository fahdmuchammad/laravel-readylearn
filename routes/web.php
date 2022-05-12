<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'AuthController@welcome')->name('welcome');
// Route::get('/', 'AuthController@home')->name('login');
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/post-login', 'AuthController@postLogin')->name('login.post');
Route::get('/registration', 'AuthController@registration')->name('register');
Route::post('/post-registration', 'AuthController@postRegistration')->name(
    'register.post'
);
Route::get('/dashboard', 'AuthController@dashboard')->middleware([
    'auth',
    'is_verify_email',
]);
Route::get('account/verify/{token}', 'AuthController@verifyAccount')->name(
    'user.verify'
);
Route::get('/verifikasi', 'AuthController@verifikasi')->name('verifikasi');
Route::get('/resend', 'AuthController@resend')->name('resend');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::prefix('paket')->group(function () {
    Route::get('/', 'PackageController@index')->name('paket.list');
    Route::post('/', 'PackageController@store')
        ->middleware('auth')
        ->name('paket.beli');
    Route::get('midtrans/{id}', 'PackageController@midtrans')
        ->middleware('auth')
        ->name('paket.midtrans');
    // Route::post('midtrans/{id}', 'PackageController@payment_post')
    //     ->middleware('auth')
    //     ->name('paket.midtranspost');
    Route::get('/bayar/{id}', 'PackageController@bayar')->name('paket.bayar');
    Route::post('/bayar', 'PackageController@confirm')->name(
        'paket.konfirmasi'
    );
});
Route::get('/adminhome', 'AdminController@index')->name('adminhome');
// Route::get('/adminlogin', 'AdminController@login')->name('adminlogin');
// Route::post('/adminloginpost', 'AdminController@loginPost')->name(
//     'adminloginpost'
// );
// Route::get('/adminregister', 'AdminController@register')->name('adminregister');
// Route::post('/adminregisterpost', 'AdminController@registerPost')->name(
//     'adminlogout'
// );
// Route::get('/adminlogout', 'AdminController@logout')->name('adminlogout');

Route::prefix('admin')->group(function () {
    Route::get('/konfirmasi', 'AdminActivityController@konfirmasi')->name(
        'admin.konfirmasi'
    );
    Route::post(
        '/transaksihapus',
        'AdminActivityController@transaksihapus'
    )->name('admin.hapus');
    Route::post(
        '/transaksiselesai',
        'AdminActivityController@transaksiselesai'
    )->name('admin.selesai');
    Route::get('/subject', 'AdminActivityController@listsubject')->name(
        'subject.list'
    );
    Route::get('/video/load', 'AdminActivityController@loadvideo')->name(
        'video.load'
    );
    Route::post('/video/load', 'AdminActivityController@uploadvideo')->name(
        'video.upload'
    );
    Route::get('/video/{id}', 'AdminActivityController@listvideo')->name(
        'video.list'
    );

    Route::get('/video/edit/{id}', 'AdminActivityController@editvideo')->name(
        'video.edit'
    );
    Route::post('/video/edit', 'AdminActivityController@changevideo')->name(
        'video.change'
    );
    Route::post('/video/delete', 'AdminActivityController@deletevideo')->name(
        'video.delete'
    );
}); //ADMIN_AKSI

Route::prefix('kelas')->group(function () {
    Route::get('/{paket}', 'KelasController@index')->name('kelas');
    Route::get('/{paket}/{subjek}/{video}', 'KelasController@detail')->name(
        'kelas.detail'
    );
}); //KELAS
Route::get('/kosong', 'KelasController@kelaskosong')->name('kosong');
