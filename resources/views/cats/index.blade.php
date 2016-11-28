@extends('template')

@section('title', $title)

@section('content')
    <h1>Categories</h1>
    <ul>
        @foreach ($cats as $cat)
        <li>
            <a href="{{ url('/cats/' . $cat->id) }}">{{ $cat->title }}</a>
        </li>
        @endforeach
    </ul>
@endsection
