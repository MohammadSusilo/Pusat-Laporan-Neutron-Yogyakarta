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

Route::get('/login', function () {
    return view('index');
});

//Auth
Route::resource('auth', 'Fitur\AuthC');

//Admin
Route::get('padmin', 'Fitur\AuthC@padmin')->middleware('LoginAdmin');
Route::get('dashboard', 'Fitur\AuthC@padmin')->middleware('LoginAdmin');
Route::get('logout', 'Fitur\AuthC@logout')->middleware('LoginAdmin');

//Fitur
// Route::resource('dashboard', 'Fitur\DashboardC');
Route::resource('server', 'Fitur\FileServerC');
Route::resource('jadwal', 'Fitur\JadwalC');
Route::get('jadwal','Fitur\JadwalC@index');
Route::resource('catatan', 'Fitur\CatatanC');
Route::resource('listkuisioner', 'Fitur\KuisionerC')->middleware('LoginAdmin');
Route::get('/','Fitur\KuisionerC@getkuisionerbagian');
Route::get('/SK','Fitur\KuisionerC@getbagianSK')->middleware('LoginToken');
Route::get('/INV','Fitur\KuisionerC@getbagianINV')->middleware('LoginToken');
Route::get('/PK','Fitur\KuisionerC@getbagianPK')->middleware('LoginToken');
Route::get('/KU','Fitur\KuisionerC@getbagianKU')->middleware('LoginToken');
Route::get('/PG','Fitur\KuisionerC@getbagianPG')->middleware('LoginToken');
Route::get('/DT','Fitur\KuisionerC@getbagianDT')->middleware('LoginToken');
Route::get('/PS','Fitur\KuisionerC@getbagianPS')->middleware('LoginToken');
Route::get('/PM','Fitur\KuisionerC@getbagianPM')->middleware('LoginToken');
Route::get('/ACC_PJK','Fitur\KuisionerC@getbagianACC_PJK')->middleware('LoginToken');
Route::get('/KP_MM','Fitur\KuisionerC@getbagianKP_MM')->middleware('LoginToken');
Route::get('/PD','Fitur\KuisionerC@getbagianPD')->middleware('LoginToken');
Route::get('/MK','Fitur\KuisionerC@getbagianMK')->middleware('LoginToken');
Route::get('/LO','Fitur\KuisionerC@getbagianLO')->middleware('LoginToken');
Route::get('/DashboardLaporan','Fitur\KuisionerC@getbagianALL')->middleware('LoginToken');
Route::post('token/cek','Fitur\KuisionerC@cektoken');
Route::resource('token', 'Fitur\TokenC');

Route::resource('changelogs', 'Fitur\Changelogs');

//Master
Route::resource('bagian', 'Fitur\BagianC');
Route::resource('role', 'Fitur\RoleC');
Route::resource('user', 'Fitur\UserC');
Route::resource('documentation', 'Fitur\documentationC');