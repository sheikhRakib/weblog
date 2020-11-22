@extends('backend.profile.app')

@section('data')
    @can('access shoutbox')
    <x-profile.shoutBox :shouts='$shouts' :lastShoutID='$lastShoutID'/>
    @endcan
@endsection
