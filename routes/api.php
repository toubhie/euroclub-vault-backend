<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\WikiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('players', PlayerController::class);

Route::get('player-positions', [HelperController::class, 'getAllPlayerPositions']);
Route::post('get-wikipedia-info', [WikiController::class, 'getWikipediaInfo']);

Route::post('/players/filter', [PlayerController::class, 'filter']);
