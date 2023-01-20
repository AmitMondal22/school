<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="{{asset('./public/wrongcode')}}/images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('./public/wrongcode')}}/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="{{asset('./public/wrongcode')}}/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('./public/wrongcode')}}/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="{{asset('./public/wrongcode')}}/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{asset('./public/wrongcode')}}/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{asset('./public/wrongcode')}}/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset('./public/wrongcode')}}/css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="{{asset('./public/wrongcode')}}/js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->


      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   </head>
   <body class="inner_page contact_page">
      <div class="full_container">
         <div class="inner_container">

         @include('wrongcode_admin.common.sidebar')
           <!-- right content -->
           <div id="content">
               <!-- topbar -->

                @include('wrongcode_admin.common.header')



        <!--**********************************
            Content body start
        ***********************************-->

        @yield('wrongcodeContent')



        <!--**********************************
            Content body end
        ***********************************-->

        </div>
         </div>


          <!-- model popup -->
         <!-- The Modal -->
         <div class="modal fade" id="changepassword">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Change Password</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                  <form action="{{route('myemployee_changepassword')}}" method="post">
                    @csrf
                  <div class="form-group">
                                        <label for="old">Current Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter Current password" id="old" name="user_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordc">Confirmed Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter Confirmed password" id="passwordc" name="password_confirmation" required>
                                    </div>
                                    <button type="submit" class="btn cur-p btn-success float-right btn-block">Update</button>
                                    </form>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end model popup -->



      </div>
      <!-- jQuery -->
      <script src="{{asset('./public/wrongcode')}}/js/jquery.min.js"></script>
      <script src="{{asset('./public/wrongcode')}}/js/popper.min.js"></script>
      <script src="{{asset('./public/wrongcode')}}/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="{{asset('./public/wrongcode')}}/js/animate.js"></script>
      <!-- select country -->
      <script src="{{asset('./public/wrongcode')}}/js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="{{asset('./public/wrongcode')}}/js/owl.carousel.js"></script>
      <!-- chart js -->
      <script src="{{asset('./public/wrongcode')}}/js/Chart.min.js"></script>
      <script src="{{asset('./public/wrongcode')}}/js/Chart.bundle.min.js"></script>
      <script src="{{asset('./public/wrongcode')}}/js/utils.js"></script>
      <script src="{{asset('./public/wrongcode')}}/js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="{{asset('./public/wrongcode')}}/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{asset('./public/wrongcode')}}/js/custom.js"></script>
      <!-- calendar file css -->
      <script src="{{asset('./public/wrongcode')}}/js/semantic.min.js"></script>



      <!-- toster -->
     <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}


      <script></script>

    @yield('wrongcodeScript')

</body>

</html>
