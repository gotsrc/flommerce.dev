@extends('flommerce')

@section('content')
<section id="checkout_form" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h4 class="card-header">Checkout</h4>
                    <div class="card-block">
                        <p class="lead"><strong>Shopping Total:</strong> &pound;<?=$totalPrice;?> </p>
                        <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? '' : '' }}">
                            {{ Session::get('error') }}
                        </div>
                        <hr />
                        {!! Form::open(['url' => 'checkout', 'method' => 'POST', 'class' => 'checkout_form']) !!}
                        @include ('cart.form', ['submitButtonText' => 'Checkout'])
                        <!-- Close the form -->
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ url('/js/checkout.js') }}"></script>
@endsection
