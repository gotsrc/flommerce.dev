@extends('template')

@section('content')
    <h1>Purchase {!! $product->title !!}</h1>
    <hr />

    {!! Form::open(['url' => 'orders']) !!}
        @include ('orders.form', ['submitButtonText' => 'Checkout'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
