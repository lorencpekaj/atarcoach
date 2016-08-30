@extends ('layouts/auth')

@section ('content')
    <div class="container container-auth">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="ac-icon atar-logo"></div>
                <h4>Reset your password</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8">
                @if (session('status'))
                    <div class="buffer-down text-center">
                        <strong style="color: white">{{ session('status') }}</strong>
                    </div>
                @endif

                {!! Form::open(['url' => '/password/email', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                    <!-- EMAIL -->
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                      {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
                      @if ($errors->has('email'))
                        {!! $errors->first('email', '<small class=text-danger>:message</small>') !!}
                      @endif
                    </div>
                
                    <div class="form-group">
                      {!! Form::submit('Send Password Reset Link', ['class' => 'btn btn-atar btn-block']) !!}
                    </div>

                    <div class="form-group text-center">
                      <small class="form-label">
                        <a href="{{ url('/') }}">Home</a> &bullet;
                        <a href="{{ url('/register') }}">Sign up</a> &bullet; 
                        <a href="{{ url('/login') }}">Sign in</a>  
                      </small>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
