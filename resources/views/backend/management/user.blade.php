@extends('backend.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <div class="form-label bg-info rounded-top px-2">View user information</div>
            <div class="input-group">
                <select class="select2 w-100 form-control" name="user" id="user">
                    <option value="-1" selected disabled>Select a user</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->username }}">{{ $user->name }} ({{ $user->username }})</option>
                    @endforeach
                </select>
                <span class="input-group-append">
                    <button id="find" class="btn btn-secondary" type="button">Find</button>
                </span>
            </div>
        </div>
    </div>
</div>

@if ($u)
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Information of {{ $u->name }}</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-sm-4 text-right">Name</dt>
                    <dd class="col-sm-8">{{ $u->name }}</dd>

                    <dt class="col-sm-4 text-right">Username</dt>
                    <dd class="col-sm-8">{{ $u->username }}</dd>

                    <dt class="col-sm-4 text-right">Email</dt>
                    <dd class="col-sm-8">{{ $u->email }}</dd>

                    <dt class="col-sm-4 text-right">Sex</dt>
                    <dd class="col-sm-8">{{ $u->sex ?? 'NULL' }}</dd>
                </dl>
            </div>

            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-sm-4 text-right">Date of Birth</dt>
                    <dd class="col-sm-8">{{ $u->dob ?? 'NULL' }}</dd>

                    <dt class="col-sm-4 text-right">Intro</dt>
                    <dd class="col-sm-8">{{ $u->intro ?? 'NULL' }}</dd>

                    <dt class="col-sm-4 text-right">Location</dt>
                    <dd class="col-sm-8">{{ $u->location ?? 'NULL' }}</dd>

                    <dt class="col-sm-4 text-right">Registered at</dt>
                    <dd class="col-sm-8">{{ $u->created_at ?? 'NULL' }}</dd>

                </dl>
            </div>
        </div>

        <dl>
            <dt>Articles</dt>
            @forelse ($u->articles as $article)
                <dd class="pa-sign">
                    <a href="{{ route('weblog.show', $article->slug) }}" target="_blank">{{ $article->title }}</a> 
                    <span class="text-xm badge @if($article->is_published) badge-success @else badge-warning @endif">{{ $article->status }}</span>
                </dd>
            @empty
            <dd>No data</dd>
            @endforelse
        </dl>
    </div>
</div>
@endif
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
    dt::after {
        content: " :";
    }

    .pa-sign::before {
        content: '## ';
    }

</style>
@endsection


@section('js')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Page script -->
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });

</script>

<script>
    $(document).ready(function () {
        $("#find").click(function () {
            var q = $("#user").val();
            console.log(q);
            var url = "/usermanagement?u=";
            window.location.href = url + q;
        });
    });

</script>

@endsection
