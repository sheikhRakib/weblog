@extends('backend.profile.edit.app')

@section('form')
<form method="POST" action="{{ route('profile.edit.password.update') }}">
    @csrf
    @method('PUT')
    
    {{-- Old Password --}}
    <div class="form-group row">
        <label for="old-password" class="col-md-3 col-form-label text-md-right">Old Password</label>

        <div class="col-md-8">
            <input id="old-password" type="password" class="form-control" name="old-password" required autofocus>
        </div>
    </div>

    {{-- New Password --}}
    <div class="form-group row">
        <label for="password" class="col-md-3 col-form-label text-md-right">New Password</label>

        <div class="col-md-8">
            <input id="password" type="password" class="form-control" name="password" required autofocus>
        </div>
    </div>

    {{-- Confirm Password --}}
    <div class="form-group row">
        <label for="confirm_password" class="col-md-3 col-form-label text-md-right">Confirm Password</label>

        <div class="col-md-8">
            <input id="confirm_password" type="password" class="form-control" name="password_confirmation" required autofocus>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">
                Update Password
            </button>
        </div>
    </div>
</form>
@endsection