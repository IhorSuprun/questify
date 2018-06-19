@extends('layout.page')
@section('content')
<p>
    {{$user->name}}
</p>
<p>
    {{$user->email}}
</p>
@can('check', $user)
<a href="http://questify.local/{{$user->name}}/profile/edit" class="btn-info">Редактировать</a>
@endcan
@endsection