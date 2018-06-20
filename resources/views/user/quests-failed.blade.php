@extends('layout.user')
@section('content')
<div class="panel-body">
     <table class="table table-striped task-table">
        Проваленные квесты 
        <thead>
            <tr>
                <th>Квест</th>
                <th>Краткое описание</th>
            </tr>
        </thead>
        <tbody>
            @if (count($quests_failed) > 0)
            @foreach ($quests_failed as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
                <td>{{ $quest->short_description }}</td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td>У данного пользователя нет проваленных квестов!</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endsection
