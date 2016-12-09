@extends('flommerce')

@section('content')
<!-- Loop over the cart -->
@if(Session::has('cart'))
<section id="cart_items" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Cart</h3>
                                <div class="card-block">
                                    <table class="table table-striped table-hover table-sm ">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th width="60%">Product</th>
                                                <th width="20%" class="text-xs-center">Quantity</th>
                                                <th class="text-xs-center">Action</th>
                                                <th width="10%" class="text-xs-right">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product['item']['title'] }}
                                                </td>
                                                <td class="text-xs-center">
                                                    <a href="#" class="tag tag-default"><i class="fa fa-minus"></i></a> <span style="margin: 0 10px;">{{ $product['quantity'] }}</span> <a href="#" class="tag tag-default"><i class="fa fa-plus"></i></a>
                                                </td>
                                                <td class="text-xs-center"><a href="#" class="fa fa-remove"></a></td>
                                                <td class="text-xs-right">&pound;{{ number_format($product['price'], 2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td class="text-xs-right" colspan="2"><strong>Total Price:</strong></td>
                                                <td class="text-xs-right">&pound;{{ number_format($totalPrice, 2) }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer text-xs-right">
                                    <a href="/cart/checkout" class="btn btn-success">Checkout</a>
                                </div>
                            @else
                                <div class="card-block">
                                    <p class="card-text">You have no items in your cart.</p>
                                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
