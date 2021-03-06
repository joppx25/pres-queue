<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\User\QueueController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('reserve/queue', [QueueController::class, 'reserve'])->name('queue.reserve');
Route::post('resolve/queue', [QueueController::class, 'resolve'])->name('queue.resolve');
