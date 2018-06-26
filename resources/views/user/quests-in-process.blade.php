@extends('layout.user')
@section('content')
<div class="panel-body">
    <table class="table table-striped task-table">
        Выполняемые квесты 
        <thead>
            <tr>
                <th>Квест</th>
                <th>Краткое описание</th>
                <th>Дата и время окончания</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @if (count($quests_inprocess) > 0)
            @foreach ($quests_inprocess as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
                <td>{{ $quest->short_description }}</td>
                <td>{{ $quest->pivot->time_end }}</td>
                <td>
                    <a href="{{ route('quest.one', ['user'=>$quest->author->name, 'quest'=>$quest->title]) }}" style="color:white">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search" >Подробнее</i>
                        </button>
                    </a></td>
                </td>
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
