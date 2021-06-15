<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SenderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', [SenderController::class, 'Send']);
Route::post('/', [SenderController::class, 'Send']);
Route::post('/{id1}', [SenderController::class, 'Send']);
Route::post('/{id1}/{id2}', [SenderController::class, 'Send']);
Route::post('/{id1}/{id2}/{id3}', [SenderController::class, 'Send']);
Route::post('/{id1}/{id2}/{id3}/{id4}', [SenderController::class, 'Send']);
