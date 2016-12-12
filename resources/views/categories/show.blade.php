@extends('flommerce')

@section('content')
<section id="products_in_category" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
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
                                                    <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
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
                    </div>
                </div>
            </div>
        </section>
@stop
