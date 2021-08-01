<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;

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
Route::get('pesan/{id}', 'PesanController@index');
Route::post('pesan/{id}', 'PesanController@pesan');
Route::get('check_out', 'PesanController@check_out');
Route::delete('check_out/{id}', 'PesanController@delete');
Route::get('konfirmasi-check-out', 'PesanController@konfirmasi');



Route::get('profile', 'ProfileController@index');
Route::post('profile', 'ProfileController@update');

Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@detail');
Route::get('cetak-pdf/{id}', 'HistoryController@cetak');
Route::get('pdf', 'HistoryController@cetakpdf');