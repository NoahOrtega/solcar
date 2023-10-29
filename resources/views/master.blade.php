<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title> @yield('title') </title>
        <meta name="description" content="@yield('description')">
        <link rel="apple-touch-icon" href="/images/logos/sc_apple_touch.png">
        <meta name="author" content="Merry Ortega">
        <link rel="stylesheet" href="/build/css/main.css">
        {{-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> --}}
        @yield('headmaster')
    </head>
    <body style="background-image: url('/images/assets/transparent-circuitry-vert.png');">
        <!--[if lt IE 9]><p>You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->
        <header id="fixed-header">
            @include('partials.header')
        </header>

        @yield('contentmaster')

        <footer id="main-footer">
            @include('partials.footer')
        </footer>
    </body>
</html>
