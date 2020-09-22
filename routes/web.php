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
Route::group(['middleware' => 'auth'], function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dasbord', function(){
            return view('layouts.silde-bar');});
        Route::resource('/divisi', 'DivisiController');
        Route::resource('/status', 'StatusController');
        Route::resource('/jabatan', 'JabatanController');       
        Route::resource('/karyawan', 'KaryawanController');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
