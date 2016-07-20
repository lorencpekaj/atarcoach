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

<body>

    <div style="width:100%;background:red;text-align:center;font-weight:600;font-size:16px">update app.blade.php</div>
    <!-- content -->
    @yield ('content')

    <!-- footer -->
    @include ('partials/footer')

    <!-- scripts -->
    @yield ('scripts')

</body>

</html>
