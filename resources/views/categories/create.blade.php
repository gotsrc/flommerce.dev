@extends('template')

@section('content')
    <h1>Create a Category</h1>

    <hr />
    <!-- Create the form -->
    {!! Form::open(['url' => 'categories']) !!}
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title') !!}
        <br />
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description') !!}
        <br />
        {!! Form::label('slug','Slug:') !!}
        {!! Form::text('slug') !!}
        <br />
        {!! Form::submit('Add Category') !!}
    {!! Form::close() !!}
@stop
