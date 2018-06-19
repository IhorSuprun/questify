@extends('layout.page')
@section('content')
<p>
    {{$user->name}}
</p>
<p>
    {{$user->email}}
</p>
@if($auth_user === $user->name)
<a href="http://questify/{{$user->name}}/profile/edit" class="btn-info">Редактировать</a>
@endif
@endsection