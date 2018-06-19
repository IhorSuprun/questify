@extends('layout.user')
@section('content')
Cтраница с выполненными квестами пользователя {{$user->name}}
<div class="panel-body">
     <table class="table table-striped task-table">
        Выполненные квесты 
        <thead>
            <tr>
                <th>Квест</th>
                <th>Краткое описание</th>
            </tr>
        </thead>
        <tbody>
            @if (count($quests_finished) > 0)
            @foreach ($quests_finished as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
                <td>{{ $quest->short_description }}</td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td>У данного пользователя нет выполнненных квестов!</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endsection
