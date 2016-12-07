@extends('flommerce')

@section('content')
<section id="products_view" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="card">
                <h4 class="card-header">Products</h4>
                <div class="card-block">
                    @foreach ($products as $product)
                    <div class="col-sm-3">
                        <div class="card-group">
                            <div class="card">
                                <h6 class="card-header">
                                    {{ $product->title }}
                                </h6>
                                <img class="card-img-top" src="/img/featured_images/{{ $product->img_path }}" style="width: 100%;" alt="Card image cap">
                            <div class="card-block">
                                <p class="card-text">
                                    {{ $product->description }}
                                </p>
                                @if ($product->sale != 1)

                                @else
                                <span class="tag tag-pill tag-success">Sale Item</span>
                                @endif
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('/products', $product->id) }}" class="btn btn-info">Purchase Item</a>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
