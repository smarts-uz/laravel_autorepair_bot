<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

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

Route::match(['get', 'post'], '/webhook', [\App\Http\Controllers\BotManController::class, 'handle']);
Route::match(['get', 'post'], '/sendMessage', [\App\Http\Controllers\BotManController::class, 'handle']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
