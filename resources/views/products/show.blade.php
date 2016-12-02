@extends('template')

@section('content')
    <h1><a href="{{ url('/products') }}">Product</a>: <small>{{ $product->title }}</small></h1>
    <hr />
    <p>{{ $product->description }}</p>
    <p>
        <?php
            setlocale(LC_MONETARY, 'en_GB');
            echo money_format('%n', $product->price);
        ?>
    </p>
        @if ($product->sale != 1)

        @else
            <p class="label label-success">Sale Item</p>
        @endif
    </p>
    <p>
        <form action="{{ url('/products/' . $product->id . '/purchase') }}" method="POST">
            <input type="hidden" id="identifier" value="{!! $product->id !!}">
            <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
            <input type="quantity" id="quantity" class="" name="quantity" value="1">
            <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
        </form>
    </p>
@stop
