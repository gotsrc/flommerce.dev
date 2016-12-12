@extends('flommerce')

@section('content')
<section id="add_category_form" class="section-top-margin">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
<h4 class="card-header">Create a Category</h4>
<div class="card-block">
<!-- Create the form -->
{!! Form::open(['url' => 'categories']) !!}
@include ('categories.form', ['submitButtonText' => 'Add Category'])
<!-- Close the form -->
{!! Form::close() !!}

@include('errors.list')
</div>
</div>
</div>
</div>
@stop
