@extends('flommerce')

@section('content')
<!-- Loop over the cart -->
<section id="cart_items" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Cart</h3>
                            @if(Session::has('cart'))
                                <div class="card-block">
                                    <table class="table table-striped table-hover table-sm ">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    $row->name
                                                </td>
                                                <td>
                                                    $row->qty
                                                </td>
                                                <td>&pound;$row->price</td>
                                                <td>&pound; $row->total</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                                <td><strong>Total</strong></td>
                                                <td>&pound; {{ $totalPrice }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="card-footer">
                                        <a href="/cart/checkout" class="btn btn-success">Checkout</a>
                                    </div>
                                </div>
                            @else
                                <div class="card-block">
                                    <p class="card-text">You have no items in your cart.</p>
                                </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
