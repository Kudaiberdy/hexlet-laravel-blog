@extends('layouts.app')

@section('content')
    <h1>List of articles</h1>
    @foreach($articles as $article)
        <h2>{{$article->name}}</h2>
        <div>{{Str::limit($article->body, 100)}}</div>
    @endforeach
@endsection
