<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SenderController;
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

Route::get('/', [SenderController::class, 'Send']);
Route::post('/', [SenderController::class, 'Send']);
Route::post('/{id1}', [SenderController::class, 'Send']);
Route::post('/{id1}/{id2}', [SenderController::class, 'Send']);
Route::post('/{id1}/{id2}/{id3}', [SenderController::class, 'Send']);
Route::post('/{id1}/{id2}/{id3}/{id4}', [SenderController::class, 'Send']);
