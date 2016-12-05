@extends('template')

@section('content')
    <h1>Congratulations!</h1>
    <hr />
    <p class="alert alert-success">Your payment was successful, and will be dispatched once we verify your
    order letting you know when you will receive your newly purchased items.</p>

    {{ redirect('/') }}
@endsection
