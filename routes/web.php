<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('mahasiswa', 'Mahasiswa@index');
Route::get('jadwal', 'JadwalController@index');
Route::get('kurikulum', 'Mahasiswa@index');
Route::get('dosen', 'Mahasiswa@index');
Route::get('mahasiswa/profile/{nim?}', 'Mahasiswa@profile');
Route::get('/ws', 'Ws@index');
//new dev 2
Route::get('/mhs','Mahasiswa@lst');
Route::get('/nilai/{nim?}','nilai@index');
Route::get('/nilai/cari','nilai@cari');



//tesr
Route::get('/tst','Mahasiswa@lst');
Route::get('/hlp/{sect}','Hlp@index');
Route::get('/shw/{sect}','Hlp@shw');

//udah ada dari dulu
Auth::routes();
Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
