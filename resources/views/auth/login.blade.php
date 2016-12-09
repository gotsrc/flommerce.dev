@extends('flommerce')

@section('content')
<section id="login_form" class="section-top-margin">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <h3 class="card-header">Login</h3>

            <div class="card-block">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="row">
                        <label for="email" class="col-md-4 form-control-label">E-Mail Address</label>
                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
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
                </div>

                <div class="card-footer">
                    <div class="checkbox pull-left">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">
                        Login
                    </button>
                </form>
                </div>
            </div>
            <a class="btn btn-link pull-right" href="{{ url('/password/reset') }}">
                Forgot Your Password?
            </a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
