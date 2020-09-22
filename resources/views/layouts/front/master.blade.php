<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="favicon.png')}}" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>SK eCommerce - Homepage</title>
    <!-- Fonts-->
    <link href="https:/fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/ps-icon/style.css')}}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{asset('assets/front/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/Magnific-Popup/dist/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/revolution/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/revolution/css/layers.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/revolution/css/navigation.css')}}">

    <!-- Custom-->
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">


    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file:/-->
    <!--[if lt IE 9]><script src="https:/oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script><script src="https:/oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script><![endif]-->
  </head>
 <body class="ps-loading">
    @include('layouts.front.header_master')

    @yield('content')

      <!-- JS Library-->
    <script type="text/javascript" src="{{asset('assets/front/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/gmap3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/imagesloaded.pkgd.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/jquery.matchHeight-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/slick/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/elevatezoom/jquery.elevatezoom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="https:/maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
    <script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>

    <!-- Custom scripts-->
    <script type="text/javascript" src="{{asset('assets/front/js/main.js')}}"></script>
    @yield('script')
  </body>
</html>