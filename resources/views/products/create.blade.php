@extends('template')

@section('content')
<div class="card">
<h4 class="card-header">Create a Product</h4>
<div class="card-block">
<!-- Create the form -->
{!! Form::open(['url' => 'products']) !!}
@include ('products.form', ['submitButtonText' => 'Add Product'])
<!-- Close the form -->
{!! Form::close() !!}

@include('errors.list')
</div>
</div>
@stop
