@extends('flommerce')

@section('content')
<section id="user_dashboard" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="card">
                <h3 class="card-header">{{ $first_name }}'s Dashboard</h3>
                <div class="card-block">
                    <p class="lead"><strong>Welcome to Flommerce</strong>, {{ $first_name }}.</p>
                    <p class="card-text">You will be able to track your orders soon.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
