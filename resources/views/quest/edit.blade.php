@extends('layout.user')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Редактировать квест</div>
                <!-- Форма новой задачи -->
                @include('common.problems')
                <form action="{{ route('quest.update', ['user'=>$user->name, 'quest'=>$quest->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <!-- Список ошибок формы -->
                    <div class="alert alert-danger">
                        <strong>Упс! Что-то пошло не так!</strong>

                        <br><br>

                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!--Название квеста-->
                    <div class="form-group">
                        <label for="quest-title" class="col-sm-3 control-label">Название квеста</label>

                        <div class="col-sm-6">
                            <input type="text" name="title" id="quest-title" class="form-control" value="{{$quest->name}}">
                        </div>
                    </div>
                    <!--Краткое описание квеста-->
                    <div class="form-group">
                        <label for="quest-short_description" class="col-sm-3 control-label">Краткое описание</label>

                        <div class="col-sm-6">
                            <textarea name="short_description" value="{{$quest->short_description}}" id="quest-short_description" class="form-control"></textarea>               
                        </div>
                    </div>
                    <!--Полное описание квеста-->
                    <div class="form-group">
                        <label for="quest-description" class="col-sm-3 control-label">Полное описание</label>

                        <div class="col-sm-6">
                            <textarea name="description" value="{{$quest->short_description}}" id="quest-description" class="form-control"></textarea>
                        </div>
                    </div>
                    <!--Фото квеста-->
                    <div class="form-group">
                        <label for="photo" class="col-md-4 control-label">Изображение квеста</label>
                        <div class="col-md-6">
                            <input id="photo" value="{{$quest->photo}}" type="file" class="form-control" name="photo">
                        </div>
                    </div>
                    <!--Ответ-->
                    <div class="form-group">
                        <label for="quest-answer" class="col-sm-3 control-label">Ответ</label>

                        <div class="col-sm-6">
                            <input type="text" name="answer" value="{{$quest->answer}}" id="quest-answer" class="form-control">
                        </div>
                    </div>
                    <!--Время для квеста-->
                    <div class="form-group">
                        <label for="quest-time" class="col-sm-3 control-label">Время для выполнения квеста</label>

                        <div class="col-sm-6">
                            <input type="number" value="{{$quest->execution_time}}" name="execution_time" id="quest-time" class="form-control">
                        </div>
                    </div>
                    <!--Публикаця-->
                    <div class="form-group">
                        <label><input type="checkbox" name="draft" id="quest-draft" class="form-control">Опубликовать</label>
                    </div>
                    <!--Кнопка создания квеста-->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i> + Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
