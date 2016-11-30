@extends('template')

@section('content')
    <h1>Create a Product</h1>

    <hr />
    <!-- Create the form -->
    {!! Form::open(['url' => 'products']) !!}

        <!-- Select a Category -->
        <p>
            {!! Form::label('category','Category:') !!}
            {!! Form::text('category_id','', ['class' => 'form-control']) !!}
        </p>

        <!-- Give the category a name. -->
        <p>
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', '', ['class' => 'form-control']) !!}
        </p>

        <!-- Give a good description. -->
        <p>
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
        </p>

        <!-- Set a Price for the Item -->
        <p>
            {!! Form::label('price', 'Price &pound;:') !!}
            {!! Form::text('price', '0', ['class' => 'form-control']) !!}
        </p>

        <!-- Is the Item in the Sale? -->
        <p>
            {!! Form::label('sale', 'In the Sale?') !!}
            {!! Form::checkbox('sale', '1', null, ['class' => 'field']) !!}
        </p>

        <!-- Provide the slug. A slug is what the browser will read for SEO. -->
        <p>
            {!! Form::label('slug','Slug:') !!}
            {!! Form::text('slug', '', ['class' => 'form-control']) !!}
        </p>

        <!-- Submit the form -->
        <p>
            {!! Form::submit('Add Product', ['class' => 'btn btn-success']) !!}
        </p>
    <!-- Close the form -->
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop
