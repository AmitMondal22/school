<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>School || {{$title}}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('./public/school')}}/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="{{asset('./public/school')}}/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





    <!-- Custom Stylesheet -->
    <link href="{{asset('./public/school')}}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="{{asset('./public/school')}}/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{asset('./public/school')}}/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{asset('./public/school')}}/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="{{asset('./public/school')}}/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="{{asset('./public/school')}}/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- datatable -->
      <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <link href="{{asset('./public/school')}}/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">




</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

    @include('school.a_common.header')
    @include('school.a_common.sidebar')


        <!--**********************************
            Content body start
        ***********************************-->

        @yield('schoolContent')



        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

     <!-- toster -->
     <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
    <script src="{{asset('./public/school')}}/plugins/common/common.min.js"></script>
    <script src="{{asset('./public/school')}}/js/custom.min.js"></script>
    <script src="{{asset('./public/school')}}/js/settings.js"></script>
    <script src="{{asset('./public/school')}}/js/gleek.js"></script>
    <script src="{{asset('./public/school')}}/js/styleSwitcher.js"></script>




    @yield('schoolScript')

</body>

</html>
