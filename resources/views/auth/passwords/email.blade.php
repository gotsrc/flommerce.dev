@extends('flommerce')

<!-- Main Content -->
@section('content')
<section id="email_reset_password_form" class="section-top-margin">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <h3 class="card-header">Reset Password</h3>
                    <div class="card-block">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="email" class="form-control-label col-md-4">
                                        E-Mail Address
                                    </label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="help-block hidden">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                    </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary pull-right">
                                Send Password Reset Link
                            </button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
