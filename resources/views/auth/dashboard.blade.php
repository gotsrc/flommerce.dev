@extends('flommerce')

@section('content')
<section id="user_dashboard" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="card">
                <h3 class="card-header">{{ $first_name }}'s Dashboard</h3>
                <div class="card-block">
                    <p class="lead"><strong>Welcome to Flommerce</strong>, {{ $first_name }}.</p>
                    <hr />
                    <div class="card">
                    <h5 class="card-header">My Orders</h5>
                    @foreach($orders as $order)
                    <div class="card-block">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="tag tag-pill tag-default">&pound;{{ $item['price'] }}</span>
                                    {{ $item['item']['title'] }} | {{ $item['quantity'] }} Units
                                </li>
                            @endforeach
                            <div class="list-group-item list-group-item-info">Order Total: &pound;{{ number_format($order->cart->totalPrice, 2) }}</div>
                        </ul>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
