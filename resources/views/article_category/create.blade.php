@extends('layouts.app')

@section('content')

    @include('error')

    {{ Form::model($category, ['url' => route('article_categories.store')]) }}
        @include('article_category.form')
        {{ Form::submit('Create') }}
    {{ Form::close() }}

@endsection
