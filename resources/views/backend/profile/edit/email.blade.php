@extends('backend.profile.edit.app')

@section('form')
<form method="POST" action="{{ route('profile.edit.email.update') }}">
    @csrf
    @method('PUT')

    {{-- Old Email --}}
    <div class="form-group row">
        <label for="old-email" class="col-md-3 col-form-label text-md-right">Old Email</label>

        <div class="col-md-8">
            <input id="old-email" type="email" class="form-control" name="old-email" placeholder="Type old mail"
                required autofocus>
        </div>
    </div>

    {{-- New Email --}}
    <div class="form-group row">
        <label for="email" class="col-md-3 col-form-label text-md-right">New Email</label>

        <div class="col-md-8">
            <input id="email" type="email" class="form-control" name="email" placeholder="Type new mail"
                required autofocus>
        </div>
    </div>

    {{-- Password --}}
    <div class="form-group row">
        <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>

        <div class="col-md-8">
            <input id="password" type="password" class="form-control" name="password" placeholder="Type password to confirm change" required autofocus>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">
                Change Email
            </button>
        </div>
    </div>
</form>
@endsection