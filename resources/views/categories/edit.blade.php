@extends('template')

@section('content')
    <h1>Editing: <small>{!! $category->title !!}</small></h1>
    <hr />
    <!-- Create the form -->
    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoriesController@update', $category->id]]) !!}
        @include ('categories.form', ['submitButtonText' => 'Edit Category'])
    <!-- Close the form -->
    {!! Form::close() !!}

    @include ('errors.list')
@stop
