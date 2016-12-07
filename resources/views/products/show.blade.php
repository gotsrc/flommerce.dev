@extends('flommerce')

@section('content')
<section id="product_show_item" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">
                        <a href="{{ url('/products') }}">Product</a>: <small>{{ $product->title }}</small>
                        @if ($product->sale != 1)

                        @else
                            <span class="tag tag-pill tag-success pull-right">Sale Item</span>
                        @endif
                    </h3>
                    <img class="card-img-top" src="/img/featured_images/{{ $product->img_path }}" style="width: 100%;" alt="Card image cap">
                    <div class="card-block">
                        <p class="lead">
                            {{ $product->description }}
                        </p>
                        <p>
                            <?php
                                setlocale(LC_MONETARY, 'en_GB');
                                echo money_format('%i', $product->price);
                            ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <form action="{{ url('/products/' . $product->id . '/purchase') }}" method="POST">
                            <input type="hidden" id="identifier" value="{!! $product->id !!}">
                            <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
                            <strong>Quantity:</strong>
                                <input type="quantity" id="quantity" class="" name="quantity" value="1">
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
