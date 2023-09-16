<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Laravelcrud;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('crud',[Laravelcrud::class,'index']);
Route::post('add',[Laravelcrud::class,'add']);
Route::get('/edit/{id}',[Laravelcrud::class,'edit']);
Route::post('/update',[Laravelcrud::class,'update'])->name('update');
Route::get('/delete/{id}',[Laravelcrud::class,'delete']);
