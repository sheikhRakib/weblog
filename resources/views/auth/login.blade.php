@extends('auth.app')

@section('content')
<p class="login-box-msg">Sign in to start your session</p>
<form action="{{ route('login')}}" method="POST">
    @csrf
    <x-auth.input id='username' icon='fa-user' type='text' />
    <x-auth.input id='password' icon='fa-lock' type='password' />

    <div class="row">
        <!-- remember me -->
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Remember Me
                </label>
            </div>
        </div>
        <!-- ./remember me -->

        <!-- signin -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- ./signin -->
    </div>
</form>

<div class="mt-4 text-center">
    <span class="d-block text-sm">OR</span>
    <a href="{{ route('register') }}" class="d-block">Register a new Membership</a>
    <span class="d-block text-sm">OR</span>
    <a href="#" class="d-block">Forgot Password</a>
</div>
@endsection
