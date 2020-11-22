<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left Navbar Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('weblog.index') }}" class="nav-link">Home</a>
        </li>
    </ul>
    <!-- ./Left Navbar Links -->


    <!-- Right Navbar Links -->
    <ul class="navbar-nav ml-auto">
        <!-- Profile Dropdown Menu -->
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a href="{{ route('profile.index') }}" class="dropdown-item">
                    <i class="fas fa-user-alt w-20"></i>
                    <span>Profile</span>
                </a>
                @can('edit profile')
                <a href="{{ route('profile.edit.index') }}" class="dropdown-item">
                    <i class="fas fa-user-cog w-20"></i>
                    <span>Edit Profile</span>
                </a>
                @endcan

                <div class="dropdown-divider"></div>
                
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt w-20"></i>
                    <span>Logout</span>
                </a>

                <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </li>
        <!-- ./Profile Dropdown Menu -->
    </ul>
    <!-- ./Right Navbar Links -->
</nav>
<!-- /.Navbar -->
