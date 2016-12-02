@extends('template')

@section('content')
    <!-- Loop over the cart -->
<section id="cart">
    <h1>Cart</h1>
    <hr />

    @if (sizeof(Cart::content()) > 0)
    <h2>You have items in your cart.</h2>
    <table class="table table-info">
        <thead>
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
                        <a href="/cart/{!! $row->id !!}/remove"<i class="fa fa-remove"></i></a>
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
                <td colspan="2">&nbsp;</td>
                <td><strong>Tax</strong></td>
                <td>&pound;{{ Cart::tax() }}</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td><strong>Total</strong></td>
                <td>&pound; {{ Cart::total() }}</td>
            </tr>
        </tfoot>
    </table>
    <a href="/cart/checkout" class="btn btn-success">Checkout</a>
    @endif
</section>
@stop
