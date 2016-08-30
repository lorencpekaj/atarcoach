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
              {!! Form::open(['url' => '/password/reset', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                <input type="hidden" name="token" value="{{ $token }}">
                
                <!-- EMAIL -->
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                  {!! Form::email('email', $email ? $email : old('email'), ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
                  @if ($errors->has('email'))
                    {!! $errors->first('email', '<small class=text-danger>:message</small>') !!}
                  @endif
                </div>

                <!-- PASSWORD -->
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                  {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                  @if ($errors->has('password'))
                    {!! $errors->first('password', '<small class=text-danger>:message</small>') !!}
                  @endif
                </div>

                <!-- PASSWORD CONFIRM -->
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                  {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
                  @if ($errors->has('password_confirmation'))
                      {!! $errors->first('password_confirmation', '<small class=text-danger>:message</small>') !!}
                  @endif
                </div>

                <div class="form-group">
                  {!! Form::submit('Reset Password', ['class' => 'btn btn-atar btn-block']) !!}
                </div>
                
                <div class="form-group text-center">
                  <small class="form-label">
                    <a href="{{ url('/') }}">Home</a> &bullet;
                    <a href="{{ url('/password/reset') }}">Forgot password</a> &bullet;
                    <a href="{{ url('/login') }}">Log in</a>  
                  </small>
                </div>
                  
              {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

