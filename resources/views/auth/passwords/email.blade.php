@extends('template')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <h4 class="card-header">Reset Password</h4>
                        <div class="card-block">
                            @if (session('status'))

                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>

                            @endif

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                                {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">
                                    E-Mail Address
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
