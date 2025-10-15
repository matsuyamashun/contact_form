<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
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


Route::get('/',[ContactController::class,'index'])->name('contacts.index');

Route::post('/contacts/confirm',[ContactController::class,'confirm'])->name('contacts.confirm');
Route::post('/contacts/thanks', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/register',[RegisterController::class,'index'])->name('register.index');
Route::get('/login', function () {
    return view('login');
});
Route::get('/admin',function() {
    return view('admin');
});