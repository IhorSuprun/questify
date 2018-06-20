@extends('layout.user')
@section('content')
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
            @if (count($quests) > 0)
            @foreach ($quests as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
                <td>{{ $quest->short_description }}</td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td>Нет квестов! (Как так?)</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endsection
