<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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




Auth::routes(['register' => false]);
Route::middleware(['auth'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('horses', App\Http\Controllers\HorseController::class);
Route::resource('betters', App\Http\Controllers\BetterController::class);
Route::get('/', function () {
    return view('index', ['horses' => \App\Models\Horse::all('name','runs','wins', 'about')]);
});
});

