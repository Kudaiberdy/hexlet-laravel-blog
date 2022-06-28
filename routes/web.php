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

Route::get('/', function () {
    return view('welcome');
}); //OLD REALIZATION

//Route::get('about', function () {
//    $tags = ['обучение', 'программирование', 'php', 'oop'];
//    return view('about', ['tags' => $tags]);
//}); //OLD REALIZATION

//Route::get('/articles', function () {
//    $articles = App\Models\Article::all();
//    return view('articles', ['articles' => $articles]);
//}); //OLD REALIZATION

//Route::get('/article/create', function () {
//    $articles = App\Models\Article::all();
//    return  view('articleCreate', ['article' => $articles]);
//}); //OLD REALIZATION


Route::get('/about', [\App\Http\Controllers\PageController::class, 'show'])
    ->name('about');

Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/articles/create', [\App\Http\Controllers\ArticleController::class, 'articleCreate']);

//Route::post('/articles', [\App\Http\Controllers\PageController::class, 'articleCreate']);

Route::get('/articles/{articleId}', [\App\Http\Controllers\ArticleController::class, 'show'])
    ->name('article.show');



