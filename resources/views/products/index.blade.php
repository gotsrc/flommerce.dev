@extends('flommerce')

@section('content')
<div class="card">
    <h4 class="card-header">Products</h4>
    <div class="card-block">
        @foreach ($products as $product)
        <div class="col-sm-6">
            <div class="card card-default">

                <h6 class="card-header">
                    <a href="{{ url('/products', $product->id) }}">
                        {{ $product->title }}
                    </a>
                    @if ($product->sale != 1)

                    @else
                        <span class="tag tag-pill tag-success pull-right">Sale Item</span>
                    @endif
                </h6>
                <div class="card-block">
                    <p class="card-text">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
