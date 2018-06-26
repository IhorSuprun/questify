@extends('layout.user')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Квест {{$quest->title}}</div>
                <p class="avatar">
                    <img src="{{asset('storage/app/public'.$quest->photo)}}"  alt="quest_photo" class="border"style="width: 100px;height: 100px;border-radius: 50%;"/>                     
                </p>
                <h4>Название:</h4>
                <p>{{$quest->title}}</p>
                <h4>Краткое описание:</h4>
                <p>{{$quest->short_description}}</p>
                <h4>Полное описание:</h4>
                <p>{{$quest->description}}</p>
                <h4>Дополнительные данные:</h4>
                <p><b>Время на выполение: </b>{{$quest->execution_time}} часа</br>
                    <b>Очки за выполение: </b>{{$quest->points}}</br>
                    <b>Рейтинг квеста: </b>{{$quest->rating}}</br>
                    <b>Автор: </b>{{$quest->author->name}}</br>
                </p>
                @include('common.problems')
                <div>
                    <!--                    TODO доделать варинаты проверки-->
                    @if($quest->author->name === Auth::user()->name)				
                        @if($is_active->isNotEmpty())               
                        <p>Квест выполняется, нельзя редактировать!</p>
                        @else
                        <a href="{{ route('quest.edit', ['user'=>$quest->author->name, 'quest'=>$quest->title]) }}" style="color:white">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-edit" > Редактировать</i>
                            </button>
                        </a>
                        <a href="{{ route('quest.delete', ['user'=>$quest->author->name, 'quest'=>$quest->title]) }}" style="color:white">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash" > Удалить</i>
                            </button>
                        </a>
                        @endif 
                    @else 
                        @if($current_active)
                            @if(($current_active->status===0) && (strtotime($current_active->getcurrenttime())>strtotime($current_active->time_end)))
                                <p>Время, данное на выполнение квеста, истекло!</p>
                            @else
                                @if($current_active->status===1)
                                    <p>Данный квест уже успешно завершен Вами</p>
                                @elseif($current_active->status===2)
                                    <p>Данный квест был неудачно завершен Вами</p>
                                @else
                    <form action="{{ route('user.finish', ['user'=>$quest->author->name, 'quest'=>$quest->title]) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        Вы выполняете данный квест, время окончания {{$current_active->time_end}}
                        <div class="form-group"> 
                            <label for="quest-answer" class="col-sm-3 control-label">Введите ответ</label>
                            <div class="col-sm-6">
                                <input type="text" name="answer" id="quest-answer" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"> Завершить</i> 
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif
                    @endif
                    @else
                    <form action="{{ route('user.start', ['user'=>$quest->author->name, 'quest'=>$quest->title]) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-search"> Начать</i> 
                        </button>
                    </form>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
