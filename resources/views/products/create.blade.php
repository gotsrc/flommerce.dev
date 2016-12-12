@extends('flommerce')

@section('content')
<section id="create_product_form" class="section-top-margin">
    <div class="row">
        <div class="col-md-6 offset-md-3">
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
</div>
</div>
@stop
