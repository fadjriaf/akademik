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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

// Route Siswa
Route::get('/siswa', 'SiswaController@index'); // Index
Route::get('/siswa/tambah','SiswaController@tambah'); // Create
Route::post('/siswa/store','SiswaController@store'); // Store
// View Don't Forget
Route::get('/siswa/edit/{id}','SiswaController@edit'); // Edit
Route::post('/siswa/update','SiswaController@update'); // Update
Route::get('/siswa/hapus/{id}','SiswaController@hapus'); // Delete
Route::get('/siswa/cari','SiswaController@cari'); // Search

// Export PDF
Route::get('/siswa/cetak_pdf', 'SiswaController@cetak_pdf');
// Export Excel
Route::get('/siswa/export_excel', 'SiswaController@export_excel');
// Import Excel
Route::post('/siswa/import_excel', 'SiswaController@import_excel');

// Send Mail
Route::get('/kirimemail','SiswaController@kirim');

// New Feature SoftDelete
Route::get('/siswa/trash', 'SiswaController@trash'); // Temporary Trash
Route::get('/siswa/kembalikan/{id}', 'SiswaController@kembalikan'); // Restore
Route::get('/siswa/kembalikan_semua', 'SiswaController@kembalikan_semua'); // Restore All
Route::get('/siswa/hapus_permanen/{id}', 'SiswaController@hapus_permanen'); // Delete Perma
Route::get('/siswa/hapus_permanen_semua', 'SiswaController@hapus_permanen_semua'); // Delete All Perma


// Route Upload
Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@proses_upload');
Route::get('/upload/hapus/{id}', 'UploadController@hapus');

// Encrypted
Route::get('/enkripsi', 'EnController@enkripsi');

// Encrypted URL
Route::get('/data/', 'EnController@data');
Route::get('/data/{data_rahasia}', 'EnController@proses');

// Hashing
Route::get('/hash', 'EnController@hash');

// Route::prefix('/home/siswa')->group(function () {
//     Route::get('/', 'SiswaController@index')->name('index.siswa');
//     Route::get('/tambah', 'SiswaController@tambah')->name('tambah.siswa');
//     Route::post('/store', 'SiswaController@store')->name('store.siswa');
//     // Route::get('/detail/{id}', 'SiswaController@show')->name('detail.siswa');
//     Route::get('/edit/{id}', 'SiswaController@edit')->name('edit.siswa');
// 	Route::post('/update/{id}', 'SiswaController@update')->name('update.siswa');
// 	Route::get('/hapus/{id}', 'SiswaController@hapus')->name('hapus.siswa');
//     Route::get('/cari','SiswaController@cari')->name('cari.siswa'); // Search
// });