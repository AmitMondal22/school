<!-- topbar -->
@php
    $st= explode('_',auth()->guard()->getName());
    $st = array_slice($st, 1);
    $st = array_slice($st, 0, -1);
    $gurd_name=implode('_',$st);
@endphp

<div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="{{asset('./public/wrongcode')}}/images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <!-- <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul> -->
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{asset('./public/wc_dp')}}/{{auth()->guard($gurd_name)->user()->dp}}" alt="#" /><span class="name_user">{{auth()->guard($gurd_name)->user()->name}}</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="{{route('wc.sa_profile')}}">My Profile</a>

                                       <!-- <button type="button" class="model_bt btn btn-primary" data-toggle="modal" data-target="#myModal">Click Here to Open Model</button> -->

                                       <a class="dropdown-item" data-toggle="modal" data-target="#changepassword" href="javascript:void(0)">Change Password</a>
                                       <!-- <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item" href="help.html">Help</a> -->
                                       <a class="dropdown-item" href="
                                       @php
                                        if(auth()->guard($gurd_name)->user()->user_role=='SA'){
                                            @endphp
                                            {{route('wc_admin_logout')}}
                                            @php
                                        }else if(auth()->guard($gurd_name)->user()->user_role=='M'){
                                            @endphp
                                            {{route('wc_admin_me_logout')}}
                                            @php
                                        }
                                       @endphp
                                       "><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
