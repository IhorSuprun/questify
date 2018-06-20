@extends('layout.user')
@section('content')
<div class="panel-body">
     <table class="table table-striped task-table">
        Выполняемые квесты 
        <thead>
            <tr>
                <th>Квест</th>
                <th>Краткое описание</th>
            </tr>
        </thead>
        <tbody>
            @if (count($quests_inprocess) > 0)
            @foreach ($quests_inprocess as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
                <td>{{ $quest->short_description }}</td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td>У данного пользователя нет выполняемых квестов!</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endsection
