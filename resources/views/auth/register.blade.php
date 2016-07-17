@extends ('layouts/auth')

@section ('content')

<div class="row">
    <div class="col-sm-8 col-sm-push-1 col-md-4 col-md-push-3 col-lg-4 col-lg-push-4">

      <div class="card">
        <div class="card-header bg-white center">
          <h4 class="card-title">Sign Up</h4>
          <p class="card-subtitle">Create a new account</p>
        </div>
        <div class="p-a-2">
          {!! Form::open(['url' => 'register', 'method' => 'POST']) !!}
            <!-- FULL NAME -->
            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                @if ($errors->has('name'))
                    {!! Form::text('name', '', ['class' => 'form-control form-control-danger', 'placeholder' => 'Name']) !!}
                    {!! $errors->first('name', '<small class=text-help>:message</small>') !!}
                @else
                  {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                @endif
            </div>

            <!-- EMAIL -->
            @if ($errors->has('email'))
              <div class="form-group has-danger">
                {!! Form::email('email', '', ['class' => 'form-control form-control-danger', 'placeholder' => 'Email Address']) !!}
                {!! $errors->first('email', '<small class=text-help>:message</small>') !!}
              </div>
            @else
              <div class="form-group">
                {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
              </div>
            @endif

            <!-- PASSWORD -->
            @if ($errors->has('password'))
              <div class="form-group has-danger">
                {!! Form::password('password', ['class' => 'form-control form-control-danger', 'placeholder' => 'Password']) !!}
                {!! $errors->first('password', '<small class=text-help>:message</small>') !!}
              </div>
            @else
              <div class="form-group">
              {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
              </div>
            @endif

            <!-- PASSWORD CONFIRM -->
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
                @if ($errors->has('password_confirmation'))
                    {!! Form::password('password_confirmation', ['class' => 'form-control form-control-danger', 'placeholder' => 'Confirm Password']) !!}
                    {!! $errors->first('password_confirmation', '<small class=text-help>:message</small>') !!}
                @else
                  {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
                @endif
            </div>

            <div class="form-group center">
              <label class="c-input c-checkbox">
                <input type="checkbox" checked>
                <span class="c-indicator"></span> I agree to the <a href="#">Terms of Use</a>
              </label>
            </div>
            <p class="center">
              {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block btn-rounded']) !!}
            </p>
            <div class="center">Already signed up? <a href="{{ url('/login') }}">Log in</a></div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>

@endsection
