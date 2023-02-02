<?php
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ProductosController;
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
//Route::resource('productos','App\Http\Controllers\ProductosController');
Route::resource('productos','ProductosController');
Route::get('notes','ProductosController@notes');
Route::get('product_key','ProductosController@product_key');
Route::get('product_table','ProductosController@product_table');
Route::get('/', function () {
    return view('welcome');
});
