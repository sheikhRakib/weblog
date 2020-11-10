@extends('backend.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <x-profile.usercard />
    </div>

    <div class="col-md-9">
        @yield('data')
    </div>
</div>
@endsection
