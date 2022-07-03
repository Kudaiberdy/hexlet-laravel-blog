<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    private $articleState = [
        'draft' => 'Draft',
        'published' => 'Published',
        'moderation' => 'Moderation'
    ];

    private function getArticleCategory()
    {
        $keys = ArticleCategory::select('id')->get()->map(fn($item) => $item->id)->all();
        $names = ArticleCategory::select('name')->get()->map(fn($item) => $item->name)->all();
        return array_combine($keys, $names);
    }

    public function create()
    {
        $article = new Article();
        $articleCategories = $this->getArticleCategory();
        $articleState = $this->articleState;

        return view('article.create', compact('article', 'articleCategories', 'articleState'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles|max:200',
            'body' => 'required|min:10',
            'category_id' => [
                Rule::in(array_keys($this->getArticleCategory())),
            ],
            'state' => [
                Rule::in(array_keys($this->articleState)),
            ]
        ]);

        $article = new Article();
        $article->fill($data);
        $article->save();

        return redirect()
            ->route('articles.index')
            ->with('status', 'The article has been successfully created');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $articleState = $this->articleState;
        $articleCategories = $this->getArticleCategory();

        return view('article.edit', compact('article', 'articleState', 'articleCategories'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $this->validate($request, [
            'name' => 'required|max:200|unique:articles,name' . $article->id,
            'body' => 'required|min:10',
            'category_id' => [
                Rule::in(array_keys($this->getArticleCategory())),
            ],
            'state' => [
                Rule::in(array_keys($this->articleState)),
            ]
        ]);

        $article->fill($data);
        $article->save();

        return redirect()
            ->route('articles.show', $id)
            ->with('status', 'The article has been successfully updated');
    }

    public function index(Request $request)
    {
        $query = $request->input('query');
        $articles = $query ? Article::where('name', 'like', "%{$query}%")->paginate() : Article::paginate();
        return view('article.index', compact('articles', 'query'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index');
    }
}
