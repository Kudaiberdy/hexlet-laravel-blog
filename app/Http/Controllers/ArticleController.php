<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function show($articleId)
    {
        $article = Article::findOrFail($articleId);
        return view('articles.showArticle', compact('article'));
    }

    public function articleCreate()
    {
        return view('articles.articleCreate');
    }
}
