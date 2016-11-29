@extends('template')

@section('content')
    <h1>Categories</h1>
    <hr />
    <dl>
        @foreach ($categories as $category)
        <dt>
            <a href="{{ url('/categories', $category->id) }}">{{ $category->title }}</a>
        </dt>
        <dd>
            {{ $category->description }}
        </dd>
        @endforeach
    </dl>
@endsection
