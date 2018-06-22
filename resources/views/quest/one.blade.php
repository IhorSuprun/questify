@extends('layout.user')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Квест {{$quest->title}}</div>
                <p class="avatar">
                    <img src="{{asset('storage/'.$quest->photo)}}"  alt="quest_photo" class="border"style="width: 100px;height: 100px;border-radius: 50%;"/>                     
                </p>
                <h4>Название:</h4>
                <p>{{$quest->title}}</p>
                <h4>Краткое описание:</h4>
                <p>{{$quest->short_description}}</p>
                <h4>Полное описание:</h4>
                <p>{{$quest->description}}</p>
                <h4>Дополнительные данные:</h4>
                <p><b>Время на выполение: </b>{{$quest->execution_time}}</br>
                    <b>Очки за выполение: </b>{{$quest->points}}</br>
                    <b>Рейтинг квеста: </b>{{$quest->rating}}</br>
                    <b>Автор: </b>{{$quest->author_id}}</br>
                </p>
                <div>
                    
                    <!--                    TODO сделать проверки
                    - является ли 
                    
                    
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
