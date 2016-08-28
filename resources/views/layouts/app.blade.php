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
  
    <!-- navigation -->
    @include ('partials/app/nav')
  
    <!-- content -->
    <div class="container buffer-top">
      
      <div class="row">
        <div class="col-md-9">
          @yield ('content')
        </div>
        
        <div class="col-sm-3">
          @include ('partials/app/sidebar')
        </div>
      </div>
      
    </div>

    <!-- footer -->
    @include ('partials/footer')

    <!-- scripts -->
    @yield ('scripts')
    
    <script type="text/javascript">
      MathJax.Hub.Config({
        tex2jax: {
          inlineMath: [['~','~']],
          processEscapes: true
        }
      });
    </script>

</body>

</html>
