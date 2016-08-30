<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Title of ATARCoach -->
  <title>{{ $title or "Atarcoach" }}</title>

  <!-- header -->
  @include ('partials/header')

  <!-- header skriptz -->
  @yield ('header_scripts')

</head>

<body class="app">
  
  <nav class="nav-admin">
    <div class="container">
      
      <div class="row">
        <div class="col-md-3">
          <a href="{{ url('/') }}"><div class="atar-logo"></div></a>
        </div>
        
        <div class="col-md-9">
          @include ('partials/app/menu', ['menuStyle' => 'btn-default'])
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="app-heading"><strong><a href="{{ route('admin.index') }}">Admin Panel</a></strong></h2>
          @if (isset($appSubheading))
            <h2><small>{{ $appSubheading }}</small></h2>
          @endif
        </div>
      </div>
      
    </div>
    
  </nav>

    <!-- content -->
    <div class="container buffer-top">
      
      <div class="row">
        <div class="col-md-12">
          @yield ('content')
        </div>
      </div>
      
    </div>

    <!-- footer -->
    @include ('partials/footer')

    <!-- scripts -->
    @yield ('scripts')

</body>

</html>
