<?php
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

// Landing Page
Route::get('/', 'FrontController@home')->name('home');
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/causes', 'FrontController@causes')->name('causes');
Route::get('/causes-detail/{id}', 'FrontController@causes_detail')->name('causes_detail');
Route::get('/payment', 'FrontController@payment')->name('payment');
Route::post('/payment/save', 'FrontController@payment_save')->name('payment_save');
Route::get('/event', 'FrontController@event')->name('event');
Route::get('/event_detail', 'FrontController@event_detail')->name('event_detail');
Route::get('/tipstrick', 'FrontController@tipstrick')->name('tipstrick');
Route::get('/tipstrick-detail/{id}', 'FrontController@tipstrick_detail')->name('tipstrick_detail');
Route::get('/lapor', 'FrontController@lapor')->name('lapor');
Route::post('/lapor/kirim', 'FrontController@lapor_kirim')->name('lapor_kirim');

Auth::routes(['register' => false]);
Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@getLogin')->middleware('guest');
    Route::post('/login', 'LoginController@postLogin')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::get('/register', 'RegisterController@getRegister')->name('register');
    Route::post('/register/store', 'RegisterController@create')->name('register.store');
});

Route::name('admin.')->namespace('admin')->middleware('auth:admin')->prefix('admin')->group(function () {
    // Dashboard
    Route::get('dashboard-admin', 'DashboardAdminController@index')->name('dashboard');
    Route::get('dashboard-admin/jumlah-transaksi', 'DashboardAdminController@jumlah_transaksi')->name('jumlah_transaksi');
    Route::get('dashboard-admin/total-lapor', 'DashboardAdminController@total_lapor')->name('total_lapor');
    Route::get('dashboard-admin/set-table', 'DashboardAdminController@setTable')->name('setTable');

    // Donasi
    Route::get('donasi', 'DonasiController@index')->name('donasi');
    Route::post('donasi/tambah', 'DonasiController@tambah')->name('donasi.tambah');
    Route::post('donasi/edit', 'DonasiController@edit')->name('donasi.edit');
    Route::get('donasi/hapus/{id}', 'DonasiController@hapus')->name('donasi.hapus');

    // Donasi Selesai
    Route::get('donasi-selesai', 'DonasiController@index_selesai')->name('donasi_selesai');
    Route::post('donasi-selesai/tambah', 'DonasiController@tambah_selesai')->name('donasi_selesai.tambah');
    Route::post('donasi-selesai/edit', 'DonasiController@edit_selesai')->name('donasi_selesai.edit');
    Route::get('donasi-selesai/hapus/{id}', 'DonasiController@hapus_selesai')->name('donasi_selesai.hapus');
    Route::get('donasi-selesai/get-penampung', 'DonasiController@getPenampung')->name('donasi_selesai.getPenampung');

    // Laporan
    Route::get('laporan', 'LaporanController@index')->name('laporan');
    Route::post('laporan/edit', 'LaporanController@edit')->name('laporan.edit');
    Route::get('laporan/hapus/{id}', 'LaporanController@hapus')->name('laporan.hapus');

    // User Management
    Route::get('user-management', 'UserManagementContoller@index')->name('user_management');
    Route::post('user-management/tambah', 'UserManagementContoller@tambah')->name('user_management.tambah');
    Route::post('user-management/edit', 'UserManagementContoller@edit')->name('user_management.edit');
    Route::get('user-management/hapus/{id}', 'UserManagementContoller@hapus')->name('user_management.hapus');

    // Tips And Trick
    Route::get('tips-trick', 'TipsTrickController@index')->name('tips_trick');
    Route::post('tips-trick/tambah', 'TipsTrickController@tambah')->name('tips_trick.tambah');
    Route::post('tips-trick/edit', 'TipsTrickController@edit')->name('tips_trick.edit');
    Route::get('tips-trick/hapus/{id}', 'TipsTrickController@hapus')->name('tips_trick.hapus');

    // Transaksi
    Route::get('transaksi', 'TransaksiController@index')->name('transaksi');
    Route::get('transaksi/get-data', 'TransaksiController@getData')->name('getData');
    Route::get('transaksi/update-data', 'TransaksiController@update_data')->name('update_data');

    // Transaksi pendonasi
    Route::get('pendonasi', 'PendonasiController@index')->name('pendonasi');
    Route::get('pendonasi/get-data', 'PendonasiController@getData')->name('getData');
});

Route::name('penampung.')->namespace('penampung')->middleware('auth:penampung')->prefix('penampung')->group(function () {
    // Dashboard
    Route::get('dashboard-penampung', 'DashboardPenampungController@index')->name('dashboard');
    Route::get('dashboard-penampung/jumlah-transaksi', 'DashboardPenampungController@jumlah_transaksi')->name('jumlah_transaksi');
    Route::get('dashboard-penampung/total-lapor', 'DashboardPenampungController@total_lapor')->name('total_lapor');

    // Donasi
    Route::get('donasi', 'DonasiController@index')->name('donasi');
    Route::post('donasi/tambah', 'DonasiController@tambah')->name('donasi.tambah');
    Route::post('donasi/edit', 'DonasiController@edit')->name('donasi.edit');
    Route::get('donasi/hapus/{id}', 'DonasiController@hapus')->name('donasi.hapus');

    // Laporan
    Route::get('laporan', 'LaporanController@index')->name('laporan');
    Route::post('laporan/edit', 'LaporanController@edit')->name('laporan.edit');
    Route::get('laporan/hapus/{id}', 'LaporanController@hapus')->name('laporan.hapus');

    // Laporan
    Route::get('pengeluaran', 'PengeluaranController@index')->name('pengeluaran');
    Route::post('pengeluaran/tambah', 'PengeluaranController@tambah')->name('pengeluaran.tambah');
    Route::post('pengeluaran/edit', 'PengeluaranController@edit')->name('pengeluaran.edit');
    Route::get('pengeluaran/hapus/{id}', 'PengeluaranController@hapus')->name('pengeluaran.hapus');
});
