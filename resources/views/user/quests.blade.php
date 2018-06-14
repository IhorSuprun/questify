@extends('layout.user')
@section('content')
Cтраница с квестами пользователя {{$user->name}}
<div class="panel-body">
     <table class="table table-striped task-table">
        Все квесты 
        <thead>
            <tr>
                <th>Квест</th>
                <th>Краткое описание</th>
            </tr>
        </thead>
        <tbody>
            @if (count($user_quests) > 0)
            @foreach ($user_quests as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
                <td>{{ $quest->short_description }}</td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td>У данного пользователя нет квестов!</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endsection
