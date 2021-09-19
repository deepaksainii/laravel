<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\ChangePassword;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[StudentController::class,'index'])->name('home');
Route::get('/test',[TestController::class,'index']);
Route::get('/create',[StudentController::class,'create'])->name('create');
Route::post('/create',[StudentController::class,'store'])->name('store');

Route::get('/edit/{id}',[StudentController::class,'edit'])->name('edit');
Route::post('/edit/{id}',[StudentController::class,'update'])->name('update');

Route::delete('/delete/{id}',[StudentController::class,'delete'])->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/changePassword',[ChangePassword::class,'index'])->name('password.change');
Route::post('/changePassword',[ChangePassword::class,'changePassword'])->name('password.update');
