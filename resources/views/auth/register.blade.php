@extends('auth.app')

@section('content')
<p class="login-box-msg">Register a new membership</p>

<form action="{{ route('register') }}" method="POST">
    @csrf
    <x-auth.input id='name' icon='fa-user' type='text' />
    <x-auth.input id='username' icon='fa-user' type='text' />
    <x-auth.input id='email' icon='fa-envelope' type='email' />
    <x-auth.input id='password' icon='fa-lock' type='password' />

    <!-- Confirm Password -->
    <div class="input-group mb-3">
        <input type="password" id="confirm_password" name="password_confirmation" class="form-control"
            placeholder="Confirm Password" required autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <i class="fas fa-lock"></i>
            </div>
        </div>
    </div>
    <!-- ./Confirm Password -->

    <div class="row">
        <!-- login -->
        <div class="col-8 p-2">
            <a href="{{ route('login') }}">Already have Membership</a>
        </div>
        <!-- ./login -->

        <!-- register -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- ./register -->
    </div>
</form>
@endsection
