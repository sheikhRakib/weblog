@extends('backend.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Add Permissions</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <select class="select2 w-100" name="user" id="user">
                    <option value="-1" selected disabled>Select a user</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->username }}">{{ $user->name }} ({{ $user->username }})</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-8">
                <div class="select2-purple">
                    <select class="select2 w-100" name="permissions" id="userPermissions" multiple="multiple"
                        data-dropdown-css-class="select2-purple">
                        
                    </select>
                </div>

            </div>
        </div>
    </div>
</div>

@foreach ($users as $user)
<p>{{ $user->name }}:
    @foreach ($user->getAllPermissions() as $permission)
    {{ $permission->name }},
    @endforeach
</p>
@endforeach


@endsection



@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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


<!-- Ajax -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#user').on('change', function (e) {
            var username = e.target.value;
            console.log(username);

            $.ajax({
                url: "{{ route('ajax.getUserPermissions') }}",
                type: "POST",
                data: {
                    username: username
                },

                success: function (data) {
					let permissions = @json($permissions);

					for (let index = 0; index < permissions.length; index++) {
						const element = permissions[index];
						
					}
                    $.each(permissions, function (index, permission) {
						$('#userPermissions').append('<option value="'+ permission.id +'">' + permission.name + '</option>');
					})
					
					$.each(data.userPermissions, function (index, permission) {
						console.log(permission);
						$('#userPermissions').selectedIndex = permission.id;
                    })

				},
				error: function (data, textStatus, errorThrown) {
        			console.log(data);
			    },
            })
        });

    });

</script>
@endsection
