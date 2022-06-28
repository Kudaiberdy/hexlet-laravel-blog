@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    <small>
        <a href="{{route('article_categories.show', $article->category)}}">
            {{ $article->category }}
        </a>
    </small>
    <div>{{$article->body}}</div>
@endsection
