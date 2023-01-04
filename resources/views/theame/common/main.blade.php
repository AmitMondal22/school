<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('./public/homeTheame')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('./public/homeTheame')}}/css/unicons.css">
    <link rel="stylesheet" href="{{asset('./public/homeTheame')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('./public/homeTheame')}}/css/owl.theme.default.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="{{asset('./public/homeTheame')}}/css/tooplate-style.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!--

Tooplate 2115 Marvel

https://www.tooplate.com/view/2115-marvel

-->
  </head>
  <body>

  @include('theame.common.menu')



        <!--**********************************
            Content body start
        ***********************************-->

        @yield('theameContent')



        <!--**********************************
            Content body end
        ***********************************-->










    @include('theame.common.footer')

     <!-- toster -->
     <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}



    <script src="{{asset('./public/homeTheame')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('./public/homeTheame')}}/js/popper.min.js"></script>
    <script src="{{asset('./public/homeTheame')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('./public/homeTheame')}}/js/Headroom.js"></script>
    <script src="{{asset('./public/homeTheame')}}/js/jQuery.headroom.js"></script>
    <script src="{{asset('./public/homeTheame')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('./public/homeTheame')}}/js/smoothscroll.js"></script>
    <script src="{{asset('./public/homeTheame')}}/js/custom.js"></script>
    @yield('theameScript')
  </body>
</html>
