<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav white-text grey">

    <!-- SideNav slide-out button -->
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
    </div>

    <!-- Breadcrumb -->
    <div class="breadcrumb-dn mr-auto black-text">
        <p><b>Student Progress Management</b></p>
    </div>

    <div class="d-flex change-mode">

        <!-- Navbar links -->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">

            <!-- Dropdown -->
            <li class="nav-item dropdown notifications-nav">
                <a href="" class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="badge red">{{$notification}}</span> <i class="fas fa-bell"></i>
                    <span class="d-none d-md-inline-block">Notifications</span>
                </a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{url('/principle/notification')}}">
                        <i class="fas fa-money mr-2" aria-hidden="true"></i>
                        <span>You have {{$notification}} messages</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>
        <!-- Navbar links -->

    </div>

</nav>
