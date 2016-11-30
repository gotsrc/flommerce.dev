@extends('template')

@section('content')
    <h1><a href="{{ url('/categories') }}">Category</a>: <small>{{ $category->title }}</small></h1>
    <hr />
    <p>{{ $category->description }}</p>

        @foreach ($category->products as $product)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ url('/products', $product->id) }}">{{ $product->title }}</a>
                @if ($product->sale != 1)

                @else
                    <p class="label label-success">Sale Item</p>
                @endif
            </div>
            <div class="panel-body">
                <p>{{ $product->description }}</p>
                <span class="badge">{{ $product->price }}</span>
            </div>
            <div class="panel-footer">
                <a href="#" class="btn btn-success">Purchase Item</a>
            </div>
        </div>
        @endforeach

    <p>
        <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
    </p>
@stop
