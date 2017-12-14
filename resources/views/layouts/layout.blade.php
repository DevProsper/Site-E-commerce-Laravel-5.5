<!DOCTYPE html>
<html lang="fr ">
  
<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Jan 2017 10:25:30 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Site web de vente en ligne">
    <meta name="author" content="Prosper NGOUARI">

    <title>Laravel-Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/app.js')}}"></script>
  </body>

<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Jan 2017 10:25:30 GMT -->
</html>
