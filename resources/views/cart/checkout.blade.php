@extends('template')

@section('content')
    <h1>Checkout</h1>
    <hr />
    <p class="lead"><strong>Total:</strong> <?php echo Cart::total(); ?></p>
    <hr />
    <!-- Create the form -->
    {!! Form::open(['url' => 'checkout', 'method' => 'POST']) !!}
        @include ('cart.form', ['submitButtonText' => 'Checkout'])
    <!-- Close the form -->
    {!! Form::close() !!}

    @include('errors.list')
@stop
