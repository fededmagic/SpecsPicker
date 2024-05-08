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
Auth::routes();
Route::middleware("auth")->group(function() {

    Route::get('/', 'App\http\controllers\HomeController@index')->name('home.index');
    Route::post('/', 'App\http\controllers\HomeController@search')->name('home.search');
    Route::get('/{id}', 'App\http\controllers\HomeController@populate')->name('home.populate');
});
Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
