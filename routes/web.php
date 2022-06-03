<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasillaController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EleccionControler;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Utilities\GraphicsController;
use App\Http\Controllers\Utilities\PDFController;
use App\Models\Casilla;

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
//Home
Route::get('/', function () {
	return view('welcome');
});
//Utilities for to generate PDF
Route::get('/casilla/pdf', [PDFController::class, "genPDFCasilla"]);
Route::get('/eleccion/pdf', [PDFController::class, "genPDFEleccion"]);
Route::get('/voto/pdf', [PDFController::class, "genPDFVoto"]);
Route::get('/candidato/pdf', [PDFController::class, "genPDFCandidato"]);
//Graphics
Route::get('/voto/graphics', [GraphicsController::class, "index"]);
//Entities
Route::resource('candidato', CandidatoController::class);
Route::resource('eleccion', EleccionControler::class);
Route::resource('voto', VotoController::class);
Route::resource('casilla', CasillaController::class);
//Login with Facebook
Route::get('login',[LoginController::class, 'index'])->name('login');
Route::get('login/facebook', [LoginController::class, 'redirectToFacebookProvider'] );
Route::get('login/facebook/callback', [LoginController::class, 'handleProviderFacebookCallback']  );
//MiddleWare
Route::middleware(['auth'])->group(function () {
	// Route::resource('voto', VotoController::class);
});