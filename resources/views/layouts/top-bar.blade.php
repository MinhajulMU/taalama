<ul class="list-unstyled topbar-right-menu float-right mb-0">

    <li class="menu-item">
        <!-- Mobile menu toggle-->
        <a class="navbar-toggle nav-link">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <!-- End mobile menu toggle-->
    </li>
    

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
           aria-haspopup="false" aria-expanded="false">
            <i class="fi-speech-bubble noti-icon"></i>
            <span class="badge badge-light badge-pill noti-icon-badge">6</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

            <!-- item-->
            <div class="dropdown-item noti-title">
                <h6 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Chat</h6>
            </div>

            <div class="slimscroll" style="max-height: 190px;">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon"><img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                    <p class="notify-details">Cristina Pride</p>
                    <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon"><img src="assets/images/users/avatar-3.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                    <p class="notify-details">Sam Garret</p>
                    <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon"><img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                    <p class="notify-details">Karen Robinson</p>
                    <p class="text-muted font-13 mb-0 user-msg">Wow that's great</p>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon"><img src="assets/images/users/avatar-5.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                    <p class="notify-details">Sherry Marshall</p>
                    <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon"><img src="assets/images/users/avatar-6.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                    <p class="notify-details">Shawn Millard</p>
                    <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                </a>
            </div>

            <!-- All-->
            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                View all <i class="fi-arrow-right"></i>
            </a>

        </div>
    </li>

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
           aria-haspopup="false" aria-expanded="false">
            <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name">{{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-item noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fi-head"></i> <span>My Account</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fi-cog"></i> <span>Settings</span>
            </a>

            <!-- item-->
            

            <!-- item-->

                <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"> <i class="fi-power"></i> <span>                
                     Log Out
                 </span></a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </a>

        </div>
    </li>
</ul>