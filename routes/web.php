<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Models\Article;
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

Route::get('/', [ArticleController::class, 'index']);
Route::view('/about', 'pages.about');

Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class);
    Route::resource('tags', TagController::class)->except('show');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class)
        ->except('show');
});

require __DIR__.'/auth.php';
