@extends('template')

@section('content')
    <h1>Create a Category</h1>

    <hr />
    <!-- Create the form -->
    {!! Form::open(['url' => 'categories']) !!}
        @include ('categories.form', ['submitButtonText' => 'Add Category'])
    <!-- Close the form -->
    {!! Form::close() !!}

    @include('errors.list')
@stop
