@extends('flommerce')

@section('content')
<div class="card">
<h4 class="card-header">Editing: <small>{!! $category->title !!}</small></h4>
<div class="card-block">
<!-- Create the form -->
{!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoriesController@update', $category->id]]) !!}
@include ('categories.form', ['submitButtonText' => 'Edit Category'])
<!-- Close the form -->
{!! Form::close() !!}

@include ('errors.list')
</div>
</div>
@stop
