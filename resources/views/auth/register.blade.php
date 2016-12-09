@extends('flommerce')

@section('content')
<section id="register_form" class="section-top-margin">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <h3 class="card-header">Register</h3>
                    <div class="card-block">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="row">
                                <label for="first_name" class="col-md-4 form-control-label">First Name</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="row">
                                <label for="last_name" class="col-md-4 form-control-label">Last Name</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="row">
                                <label for="email" class="col-md-4 form-control-label">E-Mail Address</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row">
                                <label for="password" class="col-md-4 form-control-label">Password</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="password-confirm" class="col-md-4 form-control-label">Confirm Password</label>
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary pull-right">
                            Register
                        </button>
                    <div>
                    </form>
                </div>
            </div>
    </div>
</section>
@endsection
