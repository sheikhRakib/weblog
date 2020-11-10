@extends('backend.profile.app')

@section('data')
<div class="card">
    <nav class="navbar navbar-expand navbar-dark bg-dark rounded-top">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::routeIs('profile.edit.info') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profile.edit.info') }}">Edit Info</a>
                </li>
                <li class="nav-item {{ Request::routeIs('profile.edit.email') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profile.edit.email') }}">Change Email</a>
                </li>
                <li class="nav-item {{ Request::routeIs('profile.edit.password') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profile.edit.password') }}">Change Password</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="card-body">
        @yield('form')
    </div>
</div>
@endsection
