@extends('layouts.app')

@section('content')
    <h1>{{$category->name}}</h1>
    <div>{{$category->description}}</div>
    @if (!$category->articles->isEmpty())
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
