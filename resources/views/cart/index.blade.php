@extends('flommerce')

@section('content')
<!-- Loop over the cart -->
<section id="cart_items" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Cart</h3>
                        <div class="card-block">
                            @if (sizeof(Cart::content()) > 0)
                                <table class="table table-striped table-hover table-sm ">
                                    <thead class="thead-inverse">
                                        <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $row)
                                        <tr>
                                            <td>
                                                {{ $row->name}}
                                                    <a href="/cart/<?=$row->id?>/remove"><i class="fa fa-remove"></i></a>
                                            </td>
                                            <td>{{ $row->qty }}</td>
                                            <td>&pound; {{ $row->price }}</td>
                                            <td>&pound; {{ $row->total }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                            <td><strong>Subtotal</strong></td>
                                            <td>&pound;{{ Cart::subtotal() }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tax</strong></td>
                                            <td colspan="2">&nbsp;</td>
                                            <td>&pound;{{ Cart::tax() }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                            <td><strong>Total</strong></td>
                                            <td>&pound; {{ Cart::total() }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                        </div>
                    <div class="card-footer">
                    <a href="/cart/checkout" class="btn btn-success">Checkout</a>
                    </div>
                @else
                <p class="card-text">You have no items in your cart.</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</section>
@stop
