<!-- Sidebar  -->

@php
    $st= explode('_',auth()->guard()->getName());
    $st = array_slice($st, 1);
    $st = array_slice($st, 0, -1);
    $gurd_name=implode('_',$st);
    //auth()->guard($gurd_name)->user()->user_role
@endphp

<nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="{{asset('./public/wrongcode')}}/images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{asset('./public/wc_dp')}}/{{auth()->guard($gurd_name)->user()->dp}}" alt="#" /></div>
                        <div class="user_info">
                           <h6>{{auth()->guard($gurd_name)->user()->name}}</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>WrongCode</h4>
                  <ul class="list-unstyled components">

                  @php
                      if(auth()->guard($gurd_name)->user()->user_role=='SA'){
                  @endphp
                  <li><a href="{{route('wc_Dashboard')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>






                     <li>
                        <a href="#Employee" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Employee</span></a>
                        <ul class="collapse list-unstyled" id="Employee">
                           <li><a href="{{route('wc_register')}}">> <span>New Employee</span></a></li>
                           <li><a href="{{route('myemployee')}}">> <span>Employee</span></a></li>
                        </ul>
                     </li>




@php
                      }else if(auth()->guard($gurd_name)->user()->user_role=='M'){
@endphp

<li><a href="{{route('wc.DashboardM')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>








@php
                      }
@endphp



<!--
                     <li><a href="widgets.html"><i class="fa fa-clock-o orange_color"></i> <span>Widgets</span></a></li>
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Elements</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="general_elements.html">> <span>General Elements</span></a></li>
                           <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                           <li><a href="icons.html">> <span>Icons</span></a></li>
                           <li><a href="invoice.html">> <span>Invoice</span></a></li>
                        </ul>
                     </li>
                     <li><a href="tables.html"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a></li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Apps</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="email.html">> <span>Email</span></a></li>
                           <li><a href="calendar.html">> <span>Calendar</span></a></li>
                           <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                        </ul>
                     </li>
                     <li><a href="price.html"><i class="fa fa-briefcase blue1_color"></i> <span>Pricing Tables</span></a></li>
                     <li>
                        <a href="contact.html">
                        <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                     </li>
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="profile.html">> <span>Profile</span></a>
                           </li>
                           <li>
                              <a href="project.html">> <span>Projects</span></a>
                           </li>
                           <li>
                              <a href="login.html">> <span>Login</span></a>
                           </li>
                           <li>
                              <a href="404_error.html">> <span>404 Error</span></a>
                           </li>
                        </ul>
                     </li>-->
                     <!-- <li><a href="map.html"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
                     <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
                     <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li> -->
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
