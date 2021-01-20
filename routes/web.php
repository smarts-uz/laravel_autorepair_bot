<?php

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

Route::get('/', [\App\Http\Controllers\WebsiteController::class, 'index'])->name('website.index');
Route::get('/telegram', [\App\Http\Controllers\BotManController::class, 'webView'])->name('website.index');
Route::get('/category/{slug}', [\App\Http\Controllers\WebsiteController::class, 'category'])->name('website.category');

Route::match(['get', 'post'], '/botman', [\App\Http\Controllers\BotManController::class,'handle']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
