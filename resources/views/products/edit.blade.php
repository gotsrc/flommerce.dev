@extends('template')

@section('content')
    <h1>Editing: <small>{!! $product->title !!}</small></h1>

    <hr />
    <!-- Create the form -->
    {!! Form::model($product, ['method' => 'PATCH', 'action' => ['ProductsController@update', $product->id]]) !!}
        @include ('products.form', ['submitButtonText' => 'Edit Product'])
    <!-- Close the form -->
    {!! Form::close() !!}

    @include ('errors.list')
@stop
