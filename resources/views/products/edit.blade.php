@extends('template')

@section('content')
<div class="card">
<h4 class="card-header">Editing: <small>{!! $product->title !!}</small></h4>

<div class="card-block">
<!-- Create the form -->
{!! Form::model($product, ['method' => 'PATCH', 'action' => ['ProductsController@update', $product->id]]) !!}
@include ('products.form', ['submitButtonText' => 'Edit Product'])
<!-- Close the form -->
{!! Form::close() !!}

@include ('errors.list')
</div>
</div>
@stop
