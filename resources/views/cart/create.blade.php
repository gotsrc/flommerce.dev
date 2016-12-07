@extends('flommerce')

@section('content')
<section id="purchase_product">
    <h3 class="card-header">Purchase {!! $product->title !!}</h1></h3>
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
