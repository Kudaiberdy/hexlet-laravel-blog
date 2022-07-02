@extends('layouts.app')

@section('content')

    <small>
        <a href="{{route('articles.create')}}">
            Create article
        </a>
    </small>

    {{Form::open(['url' => route('articles.index'), 'method' => 'GET'])}}
        {{Form::text('query', $query)}}
        {{Form::submit('Search')}}
    {{Form::close()}}

    <h1>List of articles</h1>

    @foreach($articles as $article)
        <h2><a href="{{ route('articles.show', $article) }}">{{$article->name}}</a></h2>
        <div>{{Str::limit($article->body, 100)}}</div>
    @endforeach

@endsection
