@extends('template')

@section('content')
    <!-- Loop over the cart -->
<section id="cart">
    <h1>Cart</h1>
    <hr />

    @if (count ($cart))
    <table class="table table-responsive table-consdensed">
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
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->quantity }}</td>
                    <td>{{ $row->price }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Subtotal</td>
                <td>{{ Cart::subtotal() }}</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Tax</td>
                <td>{{ Cart::tax() }}</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Total</td>
                <td>{{ Cart::total() }}</td>
            </tr>
        </tfoot>
    </table>
    @endif
</section>
@stop
