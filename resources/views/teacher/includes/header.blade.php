<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-body" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <router-link :to="{ name: 'teacher.home' }" class="nav-link text-body">Home</router-link>
        </li>
    </ul><!-- /.Left navbar links -->

    <!-- Right navbar links -->
    <ul class="nav navbar-nav ml-auto">
        <!-- User Profile Dropdown Menu -->
        <li class="nav-item dropdown ml-auto">
            <a class="nav-link text-body" data-toggle="dropdown" href="#">
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                <i class="fa fa-user fa-fw"></i>
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fa fa-user fa-fw"></i> User Profile
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-lock fa-fw"></i> Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt fa-fw"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf

                </form>
            </div>
        </li><!-- /.User Profile Dropdown Menu -->
    </ul><!-- /.Right navbar links -->
</nav><!-- /.navbar -->