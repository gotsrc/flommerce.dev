@extends('template')

@section('content')
    <h1>Purchase {!! $product->title !!}</h1>
    <hr />
    <p><strong>Product description:</strong> {!! $product->description !!}</p>
    <p><strong>Price:</strong> {!! $product->price !!}</p>
    <p><s
    <hr />
    {!! Form::open(['url' => 'orders']) !!}
        @include ('orders.form', ['submitButtonText' => 'Checkout'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
