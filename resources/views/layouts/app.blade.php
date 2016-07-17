<!DOCTYPE html>
<html class="bootstrap-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title or "AtarCoach" }}</title>

    <!-- header -->
    @include ('partials/header')

    <!-- header skriptz -->
    @yield ('header_scripts')

</head>
<body class="layout-container ls-top-navbar si-l3-md-up">

    <!-- nav -->
    @include ('partials/nav')

    <!-- sidebur -->
    @include ('partials/sidebar')

    <!-- content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            @yield ('content')
        </div>
    </div>

    <!-- footer -->
    @include ('partials/footer')

    <!-- scripts -->
    @yield ('scripts')
</body>
</html>
