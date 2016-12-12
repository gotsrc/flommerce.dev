@extends('flommerce')

@section('content')
<section id="checkout-success" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <h4 class="card-header">Congratulations!</h4>
                    <div class="card-block">
                        @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
