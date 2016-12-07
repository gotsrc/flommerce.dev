@extends('flommerce')

@section('content')
<h1>Congratulations!</h1>
<hr />
@if (Session::has('message'))
<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
@endsection
