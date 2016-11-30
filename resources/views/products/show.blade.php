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
        <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
    </p>
@stop
