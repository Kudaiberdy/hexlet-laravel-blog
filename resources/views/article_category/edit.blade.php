@extends('layouts.app')

@section('content')

    @include('error')

    {{ Form::model($category, ['url' => route('article_categories.update', $category), 'method' => 'PATCH']) }}
        @include('article_category.form')
        {{ Form::submit('Update') }}
    {{ Form::close() }}

@endsection
