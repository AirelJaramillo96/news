<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app');
});


Route::get('news', [NewsController::class, 'index']);

Route::post('article/store', [NewsController::class, 'storeArticle']);
Route::get('article/most_viewed', [NewsController::class, 'getMostViewedArticles']);
