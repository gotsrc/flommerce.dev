@extends('flommerce')

@section('content')
<section id="products_view" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="card">
                <h4 class="card-header">Products</h4>
                <div class="card-block">
                    @foreach ($products->chunk(3) as $productChunk)
                    <div class="container">
                        @foreach ($productChunk as $product)
                        <div class="col-md-4">
                            <div class="card-group" style="margin-bottom: 25px">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="/products/{{ $product->id }}">{{ $product->title }}</a>
                                        @if ($product->sale != 1)

                                        @else
                                        <h6><span class="tag tag-pill tag-success pull-right">Sale Item</span></h6>
                                        @endif
                                    </div>
                                    <img class="card-img-top" height="100px" src="/img/featured_images/{{ $product->img_path }}" style="width: 100%;" alt="Card image cap">
                                    <div class="card-block">
                                        <p class="card-text">
                                            <small>{{ str_limit($product->description, $limit = 40, $end = "...") }}</small>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <h5 style="margin: 0;"><span class="tag tag-default pull-left">&pound;{{ number_format($product->price, 2) }}</span></h5>
                                        <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
