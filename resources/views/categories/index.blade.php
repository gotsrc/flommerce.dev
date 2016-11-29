@extends('template')

@section('content')
    <h1>Categories</h1>
    <hr />
    <ul>
        @foreach ($categories as $category)
        <li>
            <a href="{{ url('/categories', $category->id) }}">{{ $category->title }}</a>
            <p>{{ $category->description }}</p>
        </li>
        @endforeach
    </ul>
@endsection
