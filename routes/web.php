<?php

use App\Item;
use App\Sales;
use App\User;
use App\Image;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::check())
    {
        return redirect('/home');
    }
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

    return view('test');
});

Route::get('/ventes','SalesController@index')->name('ventes')->middleware('auth');

Route::get('/commandes','CommandeController@index')->name('commandes')->middleware('auth');

Route::post('/commandes/{id}/deactivate','CommandeController@deactivate')->name('commandes.deactivate')->middleware('auth');


Route::resource('/items','ItemController');

Route::resource('/subitems','SubItemController');

Route::get('/inventaire','inventaireController@index')->name('inventaire')->middleware('auth');

Route::post('/subitems/item','SubItemController@addItem')->name('additem')->middleware('auth');


Route::get('promotions/create/{id}', [
    'as' => 'promotions.create',
    'uses' => 'PromotionController@create'
])->middleware('auth');


Route::get('/promotions/live','PromotionController@live')->name('promotions.live')->middleware('auth');

Route::get('/test2',function()
{
    $sales = Sales::orderBy('created_at','DESC')->get();
   return view('test',compact('sales'));
})->name('commandes.view')->middleware('auth');

Route::resource('/promotions', 'PromotionController', ['except' => 'create']);

Route::resource('/client','ClientController');

Route::get('/employes',function()
{
    $employes = User::all()->where('is_employee',1);
    return view('client.show_employes',compact('employes'));
})->name('employes')->middleware('auth');

Route::get('/ventes/tableau', 'SalesController@tableau')->name('ventes.tableau')->middleware('auth');

Route::post('/ventes/filtrer','SalesController@filtrer')->name('ventes.filtrer')->middleware('auth');