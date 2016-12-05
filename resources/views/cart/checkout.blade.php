@extends('template')

@section('content')
    <h1>Checkout</h1>
    <hr />
    <p class="lead"><strong>Shopping Total:</strong> &pound;<?php echo Cart::total(); ?></p>
    <hr />
    <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? '' : 'hidden' }}">
        {{ Session::get('error') }}
    </div>
    <!-- Create the form -->
    {!! Form::open(['url' => 'checkout', 'method' => 'POST', 'id' => 'checkout_form']) !!}
        @include ('cart.form', ['submitButtonText' => 'Checkout'])

    <!-- Close the form -->
    {!! Form::close() !!}

    @include('errors.list')
@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="/js/checkout.js"></script>
@endsection
