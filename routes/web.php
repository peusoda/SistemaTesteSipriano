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

Route::group(['prefix' => 'form'], function(){
    Route::get('/show', [
        'as' => 'form.show',
        'uses' => 'CursosController@show'
    ]);
    Route::get('/update/{id}', [
        'as' => 'form.update',
        'uses' => 'CursosController@update'
    ]);
    Route::put('/updateConfirm', [
        'as' => 'form.updateConfirm',
        'uses' => 'CursosController@updateConf'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'form.delete',
        'uses' => 'CursosController@delete'
    ]);
});
