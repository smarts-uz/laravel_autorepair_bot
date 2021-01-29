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

Route::group([
    'as' => 'website.'
], function () {
    Route::get('/', [\App\Http\Controllers\WebsiteController::class, 'index'])->name('index');
    Route::get('/category/{slug}', [\App\Http\Controllers\WebsiteController::class, 'category'])->name('category');
    Route::get('/prices', [\App\Http\Controllers\WebsiteController::class, 'prices'])->name('prices');
    Route::get('/reviews', [\App\Http\Controllers\WebsiteController::class, 'reviews'])->name('reviews');
    Route::post('/reviews', [\App\Http\Controllers\WebsiteController::class, 'saveReview'])->name('reviews.save');
    Route::get('/contacts', [\App\Http\Controllers\WebsiteController::class, 'contacts'])->name('contacts');
});

Route::get('/telegram', [\App\Http\Controllers\BotManController::class, 'telegramWebView'])->name('telegram.index');

Route::match(['get', 'post'], '/botman', [\App\Http\Controllers\BotManController::class,'handle']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
