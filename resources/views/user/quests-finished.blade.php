@extends('layout.user')
@section('content')
<div class="panel-body">
    <table class="table table-striped task-table">
        Выполненные квесты 
        <thead>
            <tr>
                <th>Квест</th>
                <th>Краткое описание</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @if (count($quests_finished) > 0)
            @foreach ($quests_finished as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
                <td>{{ $quest->short_description }}</td>
                <td>
                    <a href="{{ route('quest.one', ['user'=>$quest->author->name, 'quest'=>$quest->title]) }}" style="color:white">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search" >Подробнее</i>
                        </button>
                    </a></td>
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
