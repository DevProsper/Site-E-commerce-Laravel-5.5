<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Stripe 3 -->
    <script src="https://js.stripe.com/v3/"></script>
</head>
<style type="text/css">
        .cont{
            padding-top: 70px;
        }
    </style>
<body>
    @include('includes.navbar')
    <div class="container cont">
        @include('includes.messages')
        @yield('content')
    </div><!-- /.container -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
