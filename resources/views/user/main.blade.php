@extends('layout.user')
@section('content')
Главная страница пользователя {{$auth_user}}
<div class="panel-body">
    <table class="table table-striped task-table">
        ТОП квестов
        <thead>
            <tr>
                <th>Квест</th>
                <th>Краткое описание</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quests as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
                <td>{{ $quest->short_description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table table-striped task-table">
        Выполняемые квесты
        <thead>
            <tr>
                <th>Квест</th>
                <th>Дата окончания</th>
            </tr>
        </thead>
        <tbody>
            @if (count($quests_inprocess) > 0)
            @foreach ($quests_inprocess as $quest)
            <tr>
                <td>{{ $quest->id }}</td>
                <td>{{ $quest->time_end }}</td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td>Выполняемых квестов нет!</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endsection
