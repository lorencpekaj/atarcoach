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

    <!-- content -->
    @yield ('content')

    <!-- footer -->
    @include ('partials/footer')

    <!-- scripts -->
    @yield ('scripts')

</body>

</html>
