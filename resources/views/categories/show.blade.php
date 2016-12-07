@extends('flommerce')

@section('content')
<div class="card">
    <h4 class="card-header">
        <a href="{{ url('/categories') }}">Category</a>: <small>{{ $category->title }}</small></h1>
            <div class="card-block">
                <p class="lead">{{ $category->description }}</p>

                    @foreach ($category->products as $product)
                    <div class="col-md-6">
                        <div class="card card-default">
                            <h5 class="card-header">
                                <a href="{{ url('/products', $product->id) }}" class="pull-left">{{ $product->title }}</a>
                                @if ($product->sale != 1)

                                @else
                                    <span class="tag tag-pill tag-success pull-right">Sale Item</span>
                                @endif
                            </h5>
                            <div class="card-block">
                                <p>{{ $product->description }}</p>
                                <span class="tag tag-default">&pound; {{ $product->price }}</span>
                            </div>
                            <div class="card-footer">
                                <form action="{{ url('/products/' . $product->id . '/purchase') }}" method="POST">
                                    <input type="hidden" id="product_id" value="{{ $product->id }}">
                                    <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
                                    <input type="quantity" id="quantity" name="quantity" value="1">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
                <p>
                    <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
                </p>
@stop
