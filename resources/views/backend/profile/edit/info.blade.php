@extends('backend.profile.edit.app')

@section('form')
<form method="POST" action="{{ route('profile.edit.info.update') }}">
    @csrf
    @method('PUT')

    {{-- Name --}}
    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label text-md-right">Full Name</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('text') is-invalid @enderror" name="name"
                value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Intro --}}
    <div class="form-group row">
        <label for="intro" class="col-md-3 col-form-label text-md-right">Short Introduction</label>
        <div class="col-md-6">
            <input id="intro" type="text" class="form-control" name="intro" value="{{ Auth::user()->intro }}" autofocus>
        </div>
    </div>

    {{-- Sex --}}
    <div class="form-group row">
        <label for="sex" class="col-md-3 col-form-label text-md-right">Sex</label>
        <div class="col-md-8">
            <div class="form-group clearfix">
                <div class="icheck-success d-inline">
                    <input type="radio" name="sex" value="Male" id="male" @if (Auth::user()->sex == 'Male')
                    checked
                    @endif>
                    <label for="male">Male</label>
                </div>
                <br>
                <div class="icheck-success d-inline">
                    <input type="radio" name="sex" value="Female" id="female" @if (Auth::user()->sex ==
                    'Female')
                    checked @endif>
                    <label for="female">Female</label>
                </div>
            </div>
        </div>
    </div>

    {{-- Date of Birth --}}
    <div class="form-group row">
        <label for="dob" class="col-md-3 col-form-label text-md-right">Date of Birth</label>

        <div class="col-md-8">
            <div class="input-group date" id="dob" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#dob" name="dob"
                    @if(Auth::user()->dob) value="{{ date("m/d/Y", strtotime(Auth::user()->dob)) }}" @endif
                placeholder='MM/DD/YYYY'>

                <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>

    {{-- location --}}
    <div class="form-group row">
        <label for="location" class="col-md-3 col-form-label text-md-right">Location</label>
        <div class="col-md-6">
            <input id="location" type="text" class="form-control" name="location" value="{{ Auth::user()->location }}"
                placeholder="City, Country" autofocus>
        </div>
    </div>

    {{-- education --}}
    <div class="form-group row">
        <label for="education" class="col-md-3 col-form-label text-md-right">Education</label>
        <div class="col-md-6">
            <input id="education" type="text" class="form-control" name="education"
                value="{{ Auth::user()->education }}" autofocus>
        </div>
    </div>

    {{-- workplace --}}
    <div class="form-group row">
        <label for="workplace" class="col-md-3 col-form-label text-md-right">Workplace</label>
        <div class="col-md-6">
            <input id="workplace" type="text" class="form-control" name="workplace"
                value="{{ Auth::user()->workplace }}" autofocus>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">
                Update Information
            </button>
        </div>
    </div>
</form>
@endsection

@section('css')
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection


@section('js')
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- TimePicker Format Selector -->
<script>
    $(function () {
        $('.date').datetimepicker({
            format: 'L',
        });
    });

</script>

@endsection
