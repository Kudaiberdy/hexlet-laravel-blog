@extends('layouts.app')

@section('content')

    @include('flash')

    <small>
        <a href="{{ route('article_categories.create') }}">
            Create category
        </a>
    </small>

    <h1>List of article categories</h1>
    @foreach($articleCategories as $category)
        <h2><a href="{{ route('article_categories.show', $category) }}">{{$category->name}}</a></h2>
        <div>{{$category->description}}</div>
    @endforeach
@endsection
