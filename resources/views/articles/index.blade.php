@extends('layouts.app')

{{--<a href="/articles/create">Create new article</a>--}}

@section('content')
    @foreach ($articles as $article)
        <a href="/articles/{{$article->id}}"><h2>{{ $article->name }}</h2></a>
        <div>{{Str::limit($article->body, 100)}}</div>
        <div>{{$article->views_count}}</div>
    @endforeach
@endsection
