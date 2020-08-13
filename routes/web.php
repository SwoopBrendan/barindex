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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'bar' => 'BarController',
        'bar-owner' => 'BarOwnerController',
        'user' => 'UserController',
    ]);

    Route::get('/manager/create', 'BarOwnerController@createManager')->name('create.manager');
    Route::post('/manager/store', 'BarOwnerController@storeManager')->name('store.manager');
    Route::get('/bartender/create', 'BarOwnerController@createBartender')->name('create.bartender');
    Route::post('/bartender/store', 'BarOwnerController@storeBartender')->name('store.bartender');
});
