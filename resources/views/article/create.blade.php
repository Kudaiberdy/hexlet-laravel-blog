@extends('layouts.app')

@section('content')

    @include('error')

    {{ Form::model($article, ['url' => route('articles.store')]) }}
        @include('article.form')
        {{ Form::submit('Create') }}
    {{ Form::close() }}

@endsection
