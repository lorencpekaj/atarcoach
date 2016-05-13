@extends ('layouts/auth')

@section ('content')
<div class="row">
    <div class="col-sm-8 col-sm-push-1 col-md-4 col-md-push-4 col-lg-4 col-lg-push-4">
      <div class="center m-a-2">
        <div class="icon-block img-circle">
          <i class="material-icons md-36 text-muted">lock</i>
        </div>
      </div>
      <div class="card bg-transparent">
        <div class="card-header bg-white center">
          <h4 class="card-title">Login</h4>
          <p class="card-subtitle">Access your account</p>
        </div>
        <div class="p-a-2">
          {!! Form::open(['url' => '/login', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
            {!! csrf_field() !!}

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

            <div class="form-group ">
              {!! Form::submit('Login', ['class' => 'btn btn-primary btn-block btn-rounded']) !!}
            </div>
            <div class="center">
              <a href="{{ url('/password/reset') }}">
                <small>Forgot Password?</small>
              </a>
            </div>
          {!! Form::close() !!}
        </div>
        <div class="card-footer center bg-white">
          Not yet a student? <a href="{{ url('/register') }}">Sign up</a>
        </div>
      </div>
    </div>
  </div>
@endsection
