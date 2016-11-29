@extends('template')

@section('content')
    <h1>{{ $category->title }}</h1>

    {{ $category->description }}
@stop
