<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleCategoryController extends Controller
{
    private $categoryState = [
        'draft' => 'Draft',
        'published' => 'Published',
        'moderation' => 'Moderation'
    ];

    public function create()
    {
        $category = new ArticleCategory();
        $categoryState = $this->categoryState;

        return view('article_category.create', compact('category', 'categoryState'));
    }

    public function store(Request $request)
    {
        $date = $this->validate($request, [
            'name' => 'required|unique:article_categories|max:100',
            'description' => 'required|min:10',
            'state' => [
                Rule::in(array_keys($this->categoryState)),
            ]
        ]);

        $category = new ArticleCategory();
        $category->fill($date);
        $category->save();

        return redirect()
            ->route('article_categories.index')
            ->with('status', 'The category has been successfully created');
    }

    public function edit($id)
    {
        $category = ArticleCategory::findOrFail($id);
        $categoryState = $this->categoryState;

        return view('article_category.edit', compact('category', 'categoryState'));
    }

    public function update(Request $request, $id)
    {
        $category = ArticleCategory::findOrFail($id);
        $data = $this->validate($request, [
            'name' => 'required|unique:article_categories,name,' . $category->id,
            'description' => 'required|min:10',
            'state' => [
                Rule::in(array_keys($this->categoryState)),
            ]
        ]);

        $category->fill($data);
        $category->save();

        return redirect()
            ->route('article_categories.show', $id)
            ->with('status', 'The category has been successfully updated');
    }

    public function index()
    {
        $articleCategories = ArticleCategory::all();
        return view('article_category.index', compact('articleCategories'));
    }

    public function show($id)
    {
        $category = ArticleCategory::findOrFail($id);
        return view('article_category.show', compact('category'));
    }

    public function destroy($id)
    {
        $category = ArticleCategory::find($id);
        if ($category) {
            $category->delete();
        }
        return redirect()->route('article_categories.index')
            ->with('status', 'The category has been successfully deleted');
    }
}
