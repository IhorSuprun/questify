@extends('layout.user')
@section('content')
<div class="panel-body">
    <table class="table table-striped task-table">
        ТОП квестов
        <thead>
            <tr>
                <th>Квест</th>
                <th>Краткое описание</th>
                <th>Автор</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quests as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
                <td>{{ $quest->short_description }}</td>
                <td>{{ $quest->author->name }}</td>
                <td>                
                    <a href="{{ route('quest.one', ['user'=>$quest->author->name, 'quest'=>$quest->title]) }}" style="color:white">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search" >Подробнее</i>
                        </button>
                    </a></td>
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
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @if (count($quests_inprocess) > 0)
            @foreach ($quests_inprocess as $quest)
            <tr>
                <td>{{ $quest->title }}</td>
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
