@extends('flommerce')

@section('content')
<section id="product_show_item" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h4 class="card-header">
                        <a href="{{ url('/products') }}">Product</a>: <small>{{ $product->title }}</small>
                        @if ($product->sale != 1)

                        @else
                            <span class="tag tag-pill tag-success pull-right">Sale Item</span>
                        @endif
                    </h4>
                    <img class="card-img-top" src="/img/featured_images/{{ $product->img_path }}" width="100%" height="150px" alt="Card image cap">
                    <div class="card-block">
                        <p class="card-text">
                            {{ $product->description }}
                            <h4>
                                <span class="tag tag-pill tag-default pull-right">&pound;{{ number_format($product->price, 2) }}</span>
                            </h4>
                        </p>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" id="identifier" value="{{ $product->id }}">
                        <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
