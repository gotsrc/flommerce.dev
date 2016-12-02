@extends('template')

@section('content')
    <h1><a href="{{ url('/categories') }}">Category</a>: <small>{{ $category->title }}</small></h1>
    <hr />
    <p>{{ $category->description }}</p>

        @foreach ($category->products as $product)
        <div class="card card-default">
            <div class="card-heading">
                <a href="{{ url('/products', $product->id) }}">{{ $product->title }}</a>
                @if ($product->sale != 1)

                @else
                    <p class="label label-success">Sale Item</p>
                @endif
            </div>
            <div class="card-body">
                <p>{{ $product->description }}</p>
                <span class="badge">{{ $product->price }}</span>
            </div>
            <div class="card-footer">
                <form action="{{ url('/products/' . $product->id . '/purchase') }}" method="POST">
                    <input type="hidden" id="product_id" value="{{ $product->id }}">
                    <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
                    <input type="quantity" id="quantity" name="quantity" value="1">
                    <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                </form>
            </div>
        </div>
        @endforeach

    <p>
        <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
    </p>
@stop
