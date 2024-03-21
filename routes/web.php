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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/coba', 'HomeController@coba')->name('coba');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    
    Route::post('/user/delete', 'UserController@deleteUser');
    Route::post('/roles/delete', 'RoleController@deleteRole');
});







Route::group(['prefix' => 'gedung'], function () {
    Route::get('/',                            'GedungController@index');
    Route::get('/create',                      'GedungController@create');
    Route::get('/edit/{id_gedung}',            'GedungController@edit');
    Route::post('/store',                      'GedungController@store');
    Route::post('/update',                     'GedungController@update');
    Route::post('/delete',                     'GedungController@delete');
});

Route::group(['prefix' => 'lantai'], function () {
    Route::get('/',                            'LantaiController@index');
    Route::get('/create',                      'LantaiController@create');
    Route::get('/edit/{id_lantai}',            'LantaiController@edit');
    Route::post('/store',                      'LantaiController@store');
    Route::post('/update',                     'LantaiController@update');
    Route::post('/delete',                     'LantaiController@delete');
});

Route::group(['prefix' => 'ruang'], function () {
    Route::get('/',                            'RuangController@index');
    Route::get('/create',                      'RuangController@create');
    Route::get('/cetak',                       'RuangController@cetak');
    Route::get('/edit/{id_ruang}',             'RuangController@edit');
    Route::post('/store',                      'RuangController@store');
    Route::post('/update',                     'RuangController@update');
    Route::post('/delete',                     'RuangController@delete');
});







Route::group(['prefix' => 'golongan'], function () {
    Route::get('/',                            'GolonganController@index');
    Route::get('/create',                      'GolonganController@create');
    Route::get('/edit/{id_golongan}',          'GolonganController@edit');
    Route::post('/store',                      'GolonganController@store');
    Route::post('/update',                     'GolonganController@update');
    Route::post('/delete',                     'GolonganController@delete');
});

Route::group(['prefix' => 'jenis'], function () {
    Route::get('/',                            'JenisController@index');
    Route::get('/create',                      'JenisController@create');
    Route::get('/edit/{id_jenis}',             'JenisController@edit');
    Route::post('/store',                      'JenisController@store');
    Route::post('/update',                     'JenisController@update');
    Route::post('/delete',                     'JenisController@delete');
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/',                            'KategoriController@index');
    Route::get('/create',                      'KategoriController@create');
    Route::get('/edit/{id_kategori}',          'KategoriController@edit');
    Route::post('/store',                      'KategoriController@store');
    Route::post('/update',                     'KategoriController@update');
    Route::post('/delete',                     'KategoriController@delete');
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/',                            'BarangController@index');
    Route::get('/create',                      'BarangController@create');
    Route::get('/cetak' ,                      'BarangController@cetak');
    Route::get('/edit/{id_barang}',            'BarangController@edit');
    Route::post('/store',                      'BarangController@store');
    Route::post('/update',                     'BarangController@update');
    Route::post('/delete',                     'BarangController@delete');
});






Route::group(['prefix' => 'anggaran'], function () {
    Route::get('/',                            'AnggaranController@index');
    Route::get('/create',                      'AnggaranController@create');
    Route::get('/edit/{id_anggaran}',          'AnggaranController@edit');
    Route::post('/store',                      'AnggaranController@store');
    Route::post('/update',                     'AnggaranController@update');
    Route::post('/delete',                     'AnggaranController@delete');
});

Route::group(['prefix' => 'tahun'], function () {
    Route::get('/',                            'TahunPembelianController@index');
    Route::get('/create',                      'TahunPembelianController@create');
    Route::get('/edit/{id_tahun}',             'TahunPembelianController@edit');
    Route::post('/store',                      'TahunPembelianController@store');
    Route::post('/update',                     'TahunPembelianController@update');
    Route::post('/delete',                     'TahunPembelianController@delete');
});






Route::group(['prefix' => 'kartu'], function () {
    Route::get('/',                            'KartuController@index');
    Route::get('/create',                      'KartuController@create');
    Route::get('/edit/{id_kartu}',             'KartuController@edit');
    Route::post('/store',                      'KartuController@store');
    Route::post('/update',                     'KartuController@update');
    Route::post('/delete',                     'KartuController@delete');
});

Route::group(['prefix' => 'detail'], function () {
    Route::get('/',                            'DetailKartuController@index');
    Route::get('/create',                      'DetailKartuController@create');
    Route::get('/edit/{id_detailkartu}',       'DetailKartuController@edit');
    Route::post('/store',                      'DetailKartuController@store');
    Route::post('/update',                     'DetailKartuController@update');
    Route::post('/delete',                     'DetailKartuController@delete');
});





Route::group(['prefix' => 'setting'], function () {
    Route::get('/',                            'SettingController@index');
    Route::get('/create',                      'SettingController@create');
    Route::get('/edit/{id_setting}',           'SettingController@edit');
    Route::post('/store',                      'SettingController@store');
    Route::post('/update',                     'SettingController@update');
    Route::post('/delete',                     'SettingController@delete');
});