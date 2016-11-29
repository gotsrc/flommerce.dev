@extends('template')

@section('content')
    <h1><a href="{{ url()->previous() }}">Category</a>: <small>{{ $category->title }}</small></h1>
    <hr />
    <p>{{ $category->description }}</p>
    
    <p>
        <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
    </p>
@stop
