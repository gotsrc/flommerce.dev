@extends('template')

@section('content')
    <h1>{{ $product->title }}</small></h1>
    <hr />
    <p>{{ $product->description }}</p>
    <p>{{ $product->price }}</p>
    <p>Sale Offer On? {{ $product->sale }}</p>
    <p>
        <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
    </p>
@stop
