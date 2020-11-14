<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow rounded">
    <div class="container">
        <a class="navbar-brand" href="{{ route('weblog.index') }}">{{ config('app.name') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.index') }}">Profile</a>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
<!-- ./Navigation -->
