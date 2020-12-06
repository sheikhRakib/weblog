@extends('backend.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        {{-- Roles --}}
        <x-collapsibleCard title="Roles" collapse="true">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Guard</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr>
                        <td class="mailbox-name">{{ ucwords($role->name) }}</td>
                        <td class="mailbox-star">{{ $role->guard_name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">Nothing to show</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </x-collapsibleCard>
    </div>
    <div class="col-md-6">
        {{-- Permissions --}}
        <x-collapsibleCard title="Permissions" collapse="true">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Guard</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                    <tr>
                        <td class="mailbox-name">{{ ucwords($permission->name) }}</td>
                        <td class="mailbox-star">{{ $permission->guard_name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">Nothing to show</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </x-collapsibleCard>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <x-collapsibleCard title="Role Details" collapse="true">
            <ul>
                @foreach ($rp as $role)
                <li class="text-bold">{{ ucwords($role->name) }}</li>
                <ul>
                    @forelse ($role->permissions as $permission)
                    <li>{{ ucwords($permission->name) }}</li>
                    @empty
                    <li>--</li>
                    @endforelse
                </ul>
                @endforeach
        </x-collapsibleCard>
    </div>

    <div class="col-md-6">
        <x-collapsibleCard title="Rules to change Roles/Permissions" collapse="true">
            <ol>
                <li>Users can have multiple role or no role.</li>
                <li>Any permission that comes via role, cannot be revoked.</li>
                <li>Direct permissions will remain assigned when roles assigned/revoked.</li>
            </ol>
        </x-collapsibleCard>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {{-- Asign user Permissions --}}
        <x-collapsibleCard title="User Permissions">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label bg-info rounded-top px-2">View user information</div>
                        <select class="select2 w-100" name="user" id="user">
                            <option value="-1" selected disabled>Select a user</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->username }}">{{ $user->name }} ({{ $user->username }})</option>
                            @endforeach
                        </select>
                    </div>

                    @can('modify roles')
                    {{-- Assign/Revoke Roles --}}
                    <div class="form-group mt-4">
                        <div class="form-label bg-info rounded-top px-2">Assign/Revoke Roles</div>
                        <select class="select2 w-100" name="ModifyRoles" id="ModifyRoles">
                            <option value="-1" selected disabled>Select a role</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endcan

                    @can('modify permissions')
                    {{-- Assign/Revoke Roles --}}
                    <div class="form-group mt-4">
                        <div class="form-label bg-info rounded-top px-2">Assign/Revoke Permissions</div>
                        <select class="select2 w-100" name="ModifyPermissions" id="ModifyPermissions">
                            <option value="-1" selected disabled>Select a Permission</option>
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endcan

                    @role('admin')
                    <div class="d-flex justify-content-between">
                        <button id="assignorrevoke" type="submit" class="btn btn-primary">Assign Or Revoke</button>
                        <button id="clearRP" class="btn btn-danger">Clear</button>
                    </div>
                    @endrole
                </div>

                <div class="card col-md-8">
                    <dl class="row card-body">
                        <dt class="col-sm-3 text-right">Name</dt>
                        <dd class="col-sm-9" id="fullname">--</dd>
                        <dt class="col-sm-3 text-right">Userame</dt>
                        <dd class="col-sm-9" id="username">--</dd>
                        <dt class="col-sm-3 text-right">Email</dt>
                        <dd class="col-sm-9" id="email">--</dd>
                        <dt class="col-sm-3 text-right">Roles</dt>
                        <dd class="col-sm-9 text-capitalize" id="roles">--</dd>
                        <dt class="col-sm-3 text-right">Permissions</dt>
                        <dd class="col-sm-9 text-capitalize" id="permissions">--</dd>
                    </dl>
                </div>
            </div>
        </x-collapsibleCard>
    </div>
</div>

@endsection


@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<style>
    dt::after {
        content: " :";
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
        $('#clearRP').on('click', function () {
            $('#ModifyRoles').val("-1").change();
            $('#ModifyPermissions').val("-1").change();
        })
    })

</script>


<!-- Ajax -->
{{-- AJAX function to get user information --}}
<script type="text/javascript">
    $(document).ready(function () {
        // show user data
        $('#user').on('change', function (e) {
            var username = e.target.value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('ajax.getUserPermissions') }}",
                type: "POST",
                data: {
                    username: username
                },

                success: function (data) {
                    let permissions = @json($permissions);

                    // Show user data
                    $("#fullname").html(data.user.name)
                    $("#username").html(data.user.username)
                    $("#email").html(data.user.email)

                    // Show user roles 
                    if (data.roles.length) {
                        $("#roles").html("")
                    } else {
                        $("#roles").html("--")
                    }
                    $.each(data.roles, function (index, role) {
                        $("#roles").append(role + "<br>")
                    })

                    // Show user permissions
                    if (data.userPermissions.length) {
                        $("#permissions").html("")
                    } else {
                        $("#permissions").html("--")
                    }
                    $.each(data.userPermissions, function (index, permission) {
                        $("#permissions").append(permission.name + " (" +
                            permission
                            .level + ")" + "<br>")
                    })
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            })
        });


    });

</script>

{{-- AJAX function to modify roles and permissions --}}
<script type="text/javascript">
    $('#assignorrevoke').on('click', function () {
        let username = $('#user').val();
        let role = $('#ModifyRoles').val();
        let permission = $('#ModifyPermissions').val();


        if (!username) return 0;

        if (!(role || permission)) return 0;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('ajax.modifyRoleOrPermission') }}",
            type: "POST",
            data: {
                username: username,
                role: role,
                permission: permission,
            },

            success: function (data) {
                $('#user').val(username).change();
                $('#ModifyRoles').val("-1").change();
                $('#ModifyPermissions').val("-1").change();

                console.log(data.message);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
            },
        })
    })

</script>
@endsection
