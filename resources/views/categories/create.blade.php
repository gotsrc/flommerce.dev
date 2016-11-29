@extends('template')

@section('content')
    <h1>Create a Category</h1>

    <hr />
    <!-- Create the form -->
    {!! Form::open(['url' => 'categories']) !!}
        <!-- Give the category a name. -->
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title') !!}
        <br />
        <!-- Give a good description. -->
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description') !!}
        <br />
        <!-- Provide the slug. A slug is what the browser will read for SEO. -->
        {!! Form::label('slug','Slug:') !!}
        {!! Form::text('slug') !!}
        <br />
        <!-- Submit the form -->
        {!! Form::submit('Add Category') !!}
    <!-- Close the form -->    
    {!! Form::close() !!}
@stop
