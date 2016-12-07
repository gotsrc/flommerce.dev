@extends('flommerce')

@section('content')
<div class="col-md-12">
    <div class="card">
        <h3 class="card-header">{{ $name }}'s Dashboard</h3>
        <div class="card-block">
            <p class="lead"><strong>Welcome to Flommerce</strong>, {{ $name }}.</p>
            <p class="card-text">You will be able to track your orders soon.</p>
        </div>
    </div>
</div>
@endsection
