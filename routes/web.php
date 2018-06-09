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

Route::get('/', function () {
    return view('welcome');
});

Route::get('cek', function(){
    return view('layouts.admin');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'admin', 'middleware' => ['auth','role:admin']], function(){
    //isi route disini
    Route::resource('kategori', 'KategoriController');
    Route::resource('travel', 'TravelController');
    Route::resource('kuliner', 'KulinerController');
    Route::resource('galleri', 'GalleriController');
    Route::resource('info', 'InfopraktisController');
    Route::resource('about', 'AboutController');
    Route::resource('artikel', 'ArtikelController');  
});