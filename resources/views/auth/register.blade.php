@extends ('layouts/auth')

@section ('content')

    <div class="container container-auth">

        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="ac-icon atar-logo"></div>
                <h4>Create a new account</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">

              {!! Form::open(['url' => 'register', 'method' => 'POST']) !!}
                <!-- FULL NAME -->
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                  @if ($errors->has('name'))
                    {!! $errors->first('name', '<small class=text-danger>:message</small>') !!}
                  @endif
                </div>

                <!-- EMAIL -->
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                  {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
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
                  {!! Form::submit('Sign up', ['class' => 'btn btn-atar btn-block']) !!}
                </p>
                
                <div class="form-group text-center">
                  <small class="form-label">
                    <a href="{{ url('/') }}">Home</a> &bullet;
                    <!--<a href="{{ url('/password/reset') }}">Forgot password?</a> &bullet;-->
                    <a href="{{ url('/login') }}">Log in</a>  
                  </small>
                </div>
              {!! Form::close() !!}

            </div>
        </div>

    </div>
@endsection
