@extends('template')

@section('content')
    <h1>Create a Product</h1>

    <hr />
    <!-- Create the form -->
    {!! Form::open(['url' => 'products']) !!}
        @include ('products.form', ['submitButtonText' => 'Add Product'])
    <!-- Close the form -->
    {!! Form::close() !!}

    @include('errors.list')
@stop
