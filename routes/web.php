<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasillaController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EleccionControler;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\Auth\LoginController;



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

Route::resource('casilla',CasillaController::class);
Route::resource('candidato',CandidatoController::class);
Route::resource('eleccion',EleccionControler::class);
Route::resource('voto',VotoController::class);

/*
Route::get('/login', [LoginController::class,'index']);
Route::get('/login/facebook/', [LoginController::class,"redirectToFacebookProvider"]);
Route::get('/login/facebook/callback', [LoginController::class,"handleProviderFacebookCallback"]);
*/

//TESTING Custom ROUTES 
Route::get('/login', [LoginController::class,'showViewTest']);
