@extends('template')

@section('content')
    <h1>{{ $category->title }}</h1>

    {{ $category->description }}

    <p>
        <a href="{{ url()->previous() }}">Back</a>
    </p>
@stop
