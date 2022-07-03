@extends('layouts.app')

@section('content')

    @include('flash')

    <h1>{{$category->name}}</h1>
    <div>State: {{$category->state}}</div>
    <div>{{$category->description}}</div>

    <div>
        <a href="{{route('article_categories.edit', ['id' => $category->id])}}">
            Edit
        </a>
    </div>
    <div>
        <a href="{{ route('article_categories.destroy', $category) }}" data-confirm='Are you sure?' data-method="delete" rel="nofollow">Delete</a>
    </div>
    @if ($category->articles->isNotEmpty())
        <h2>Articles</h2>
        <div>
            <ol>
                @foreach ($category->articles as $article)
                    <li>
                        <a href="{{route('articles.show', ['id' => $article->id])}}">{{$article->name}}</a>
                    </li>
                @endforeach
            </ol>
        </div>
    @endif

@endsection
