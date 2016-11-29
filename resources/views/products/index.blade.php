@extends('template')

@section('content')
    <h1>Products</h1>
    <hr />
    <dl>
        @foreach ($products as $product)
        <dt>
            <a href="{{ url('/products', $product->id) }}">{{ $product->title }}</a>
        </dt>
        <dd>
            {{ $product->description }}
        </dd>
        @endforeach
    </dl>
@endsection
