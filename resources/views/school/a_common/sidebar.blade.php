
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="" href="{{route('school.dashboard')}}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                      </a>
                          <!-- <ul aria-expanded="false">
                            <li><a href="{{asset('./public/school')}}/index.html">Home 1</a></li>
                             <li><a href="{{asset('./public/school')}}/index-2.html">Home 2</a></li> -->
                        <!-- </ul> -->
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-home menu-icon"></i></i><span class="nav-text">My school</span>
                      </a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('school.school')}}">School</a></li>
                                <li><a href="{{route('school.schoolAdd')}}">New School</a></li>
                                <li class="nav-label">Class</li>
                                <li><a href="{{route('school.addclass')}}">New Class</a></li>

                                <!-- <li class="nav-label">Teacher</li> -->
                                <!-- <li><a href="{{route('school.addteacher')}}">New Teacher</a></li>
                                <li><a href="{{route('school.all_teacher')}}">Teacher</a></li> -->
                            </ul>
                    </li>

                    <!-- <li class="nav-label">Teacher</li> -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-people menu-icon"></i></i><span class="nav-text">Teacher</span>
                      </a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('school.addteacher')}}">New Teacher</a></li>
                                <li><a href="{{route('school.all_teacher')}}">My Teacher</a></li>
                            </ul>
                    </li>

                    <li>
                        <a href="{{route('school.all_class')}}" aria-expanded="false"><i class="icon-user-following menu-icon"></i><span class="nav-text">Class</span></a>
                    </li>
                    <li class="nav-label">Student</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i><span class="nav-text">My Student</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('school.my_student')}}">My Student</a></li>
                            <li><a href="{{route('school.student_admision')}}">Admission Student</a></li>
                        </ul>
                    </li>

<!--
                    <li class="nav-label">Apps</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{asset('./public/school')}}/email-inbox.html">Inbox</a></li>
                            <li><a href="{{asset('./public/school')}}/email-read.html">Read</a></li>
                            <li><a href="{{asset('./public/school')}}/email-compose.html">Compose</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Apps</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{asset('./public/school')}}/app-profile.html">Profile</a></li>
                            <li><a href="{{asset('./public/school')}}/app-calender.html">Calender</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Charts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{asset('./public/school')}}/chart-flot.html">Flot</a></li>
                            <li><a href="{{asset('./public/school')}}/chart-morris.html">Morris</a></li>
                            <li><a href="{{asset('./public/school')}}/chart-chartjs.html">Chartjs</a></li>
                            <li><a href="{{asset('./public/school')}}/chart-chartist.html">Chartist</a></li>
                            <li><a href="{{asset('./public/school')}}/chart-sparkline.html">Sparkline</a></li>
                            <li><a href="{{asset('./public/school')}}/chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">UI Components</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">UI Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{asset('./public/school')}}/ui-accordion.html">Accordion</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-alert.html">Alert</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-badge.html">Badge</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-button.html">Button</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-button-group.html">Button Group</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-cards.html">Cards</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-carousel.html">Carousel</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-dropdown.html">Dropdown</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-list-group.html">List Group</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-media-object.html">Media Object</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-modal.html">Modal</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-pagination.html">Pagination</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-popover.html">Popover</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-progressbar.html">Progressbar</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-tab.html">Tab</a></li>
                            <li><a href="{{asset('./public/school')}}/ui-typography.html">Typography</a></li>
                         </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{asset('./public/school')}}/uc-nestedable.html">Nestedable</a></li>
                            <li><a href="{{asset('./public/school')}}/uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="{{asset('./public/school')}}/uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="{{asset('./public/school')}}/uc-toastr.html">Toastr</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Widget</span>
                        </a>
                    </li>
                    <li class="nav-label">Forms</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{asset('./public/school')}}/form-basic.html">Basic Form</a></li>
                            <li><a href="{{asset('./public/school')}}/form-validation.html">Form Validation</a></li>
                            <li><a href="{{asset('./public/school')}}/form-step.html">Step Form</a></li>
                            <li><a href="{{asset('./public/school')}}/form-editor.html">Editor</a></li>
                            <li><a href="{{asset('./public/school')}}/form-picker.html">Picker</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Table</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{asset('./public/school')}}/table-basic.html" aria-expanded="false">Basic Table</a></li>
                            <li><a href="{{asset('./public/school')}}/table-datatable.html" aria-expanded="false">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Pages</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{asset('./public/school')}}/page-login.html">Login</a></li>
                            <li><a href="{{asset('./public/school')}}/page-register.html">Register</a></li>
                            <li><a href="{{asset('./public/school')}}/page-lock.html">Lock Screen</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{asset('./public/school')}}/page-error-404.html">Error 404</a></li>
                                    <li><a href="{{asset('./public/school')}}/page-error-403.html">Error 403</a></li>
                                    <li><a href="{{asset('./public/school')}}/page-error-400.html">Error 400</a></li>
                                    <li><a href="{{asset('./public/school')}}/page-error-500.html">Error 500</a></li>
                                    <li><a href="{{asset('./public/school')}}/page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

-->
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
