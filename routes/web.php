<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ArticleController, ArticleCategoryController, PageController};

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', 'PageController@show')
    ->name('about');

//////ARTICLES
Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index')
        ->name('articles.index');

    Route::get('/articles/create', 'create')
        ->name('articles.create');

    Route::post('/articles', 'store')
        ->name('articles.store');

    Route::get('/articles/{id}/edit', 'edit')
        ->name('articles.edit');

    Route::patch('/articles/{id}', 'update')
        ->name('articles.update');

    Route::get('/articles/{id}', 'show')
        ->name('articles.show');

    Route::delete('articles/{id}', 'destroy')
        ->name('articles.destroy');
});

//////ARTICLE CATEGORIES
Route::controller(ArticleCategoryController::class)->group(function () {
    Route::get('/article_categories', 'index')
        ->name('article_categories.index');

    Route::get('/article_categories/create', 'create')
        ->name('article_categories.create');

    Route::post('/article_categories', 'store')
        ->name('article_categories.store');

    Route::get('/article_categories/{id}/edit', 'edit')
        ->name('article_categories.edit');

    Route::patch('/article_categories/{id}', 'update')
        ->name('article_categories.update');

    Route::get('/article_categories/{id}', 'show')
        ->name('article_categories.show');
});
