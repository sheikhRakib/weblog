<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    
    @yield('css')
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('plugins/adminlte/css/adminlte.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">


    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>


<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">
        <x-profile.navbar />
        <x-profile.sidebar />

        <!-- Page Content -->
        <div class="content-wrapper pt-4">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /.Page Content -->

        <x-profile.footer />
    </div>

    <!-- REQUIRED SCRIPTS -->
    @yield('js')

    <!-- AdminLTE -->
    <script src="{{ asset('plugins/adminlte/js/adminlte.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    @include('utility.toastr')
</body>

</html>
