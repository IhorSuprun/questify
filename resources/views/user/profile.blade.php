@extends('layout.page')
@section('content')
<p>
    {{$user->name}}
</p>
<p>
    {{$user->email}}
</p>
@if($auth_user === $user->name)
<p>I can edit</p>
@endif
@endsection