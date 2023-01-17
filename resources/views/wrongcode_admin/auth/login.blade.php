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
      <script src="https://oss.maxcdn.com/libs/respond.{{asset('./public/wrongcode')}}/js/1.4.2/respond.min.js"></script>
      <![endif]-->


      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="210" src="{{asset('./public/wrongcode')}}/images/logo/logo.png" alt="#" />
                     </div>
                  </div>
                  <div class="login_form">
                     <form action="{{route('wc_login')}}" method="post">
                        @csrf
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Email Address</label>
                              <input type="email" name="email" placeholder="E-mail" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" />
                           </div>
                           <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="">Forgotten Password?</a>
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt">Sing In</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{asset('./public/wrongcode')}}/js/jquery.min.js"></script>
      <script src="{{asset('./public/wrongcode')}}/js/popper.min.js"></script>
      <script src="{{asset('./public/wrongcode')}}/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="{{asset('./public/wrongcode')}}/js/animate.js"></script>
      <!-- select country -->
      <script src="{{asset('./public/wrongcode')}}/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="{{asset('./public/wrongcode')}}/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{asset('./public/wrongcode')}}/js/custom.js"></script>


     <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>

      <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
   </body>
</html>
