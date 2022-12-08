<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TesLogikaController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/tes-logika-1', [TesLogikaController::class, 'countKaosKaki']);
Route::get('/tes-logika-2', [TesLogikaController::class, 'countJumlahKata']);
