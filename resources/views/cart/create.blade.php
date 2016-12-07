@extends('flommerce')

@section('content')
<h1>Purchase {!! $product->title !!}</h1>
<hr />
<p><strong>Product description:</strong> {!! $product->description !!}</p>
<p><strong>Price:</strong> {!! $product->price !!}</p>
<p><s
<hr />
{!! Form::open(['url' => '/cart/add']) !!}
@include ('cart.form', ['submitButtonText' => 'Checkout'])
{!! Form::close() !!}

@include('errors.list')
@stop
