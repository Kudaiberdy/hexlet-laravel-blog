@extends('layouts.app')

@section('content')

    @include('flash')

    <h1>{{$article->name}}</h1>
    <h2>Article category</h2>
    <small>
        <a href="{{route('article_categories.show', $article->category)}}">
            {{ $article->category }}
        </a>
    </small>
    <div>{{$article->body}}</div>

    <div>
        <a href="{{route('articles.edit', ['id' => $article->id])}}">
            Edit
        </a>
    </div>

@endsection
