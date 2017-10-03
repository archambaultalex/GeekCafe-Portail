<?php

use App\User;
use App\Image;
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

Route::get('/logout', function(){
    session_start();
    session_destroy();
    return view('auth/login');
});

Route::resource('/profile','ProfileController');

Route::get('/test', function(){

    return view('layouts.app');

});

Route::get('/ventes','VenteController@index')->name('ventes')->middleware('auth');

Route::get('/commandes','CommandeController@index')->name('commandes')->middleware('auth');



Route::get('/inventaire','inventaireController@index')->name('inventaire')->middleware('auth');

Route::get('/items','ItemController@index')->name('items')->middleware('auth');

Route::get('/items/{idItem}/price','ItemPriceController@index')->name('price')->middleware('auth');

Route::get('/items/{idItem}/size','ItemSizeController@index')->name('size')->middleware('auth');

Route::get('/items/{idItem}/subitem','ItemSubitemController@index')->name('subitem')->middleware('auth');

Route::get('/items/{idItem}/price','ItemPriceController@index')->name('price')->middleware('auth');


Route::resource('/promotions','PromotionController');