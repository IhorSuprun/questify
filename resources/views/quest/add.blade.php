@extends('layout.user')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Создать новый квест</div>
                <!-- Форма новой задачи -->
                <form action="{{ route('quest.create', ['user'=>$user->name]) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <!--Название квеста-->
                    <div class="form-group">
                        <label for="quest-title" class="col-sm-3 control-label">Название квеста</label>

                        <div class="col-sm-6">
                            <input type="text" name="title" id="quest-title" class="form-control">
                        </div>
                    </div>
                    <!--Краткое описание квеста-->
                    <div class="form-group">
                        <label for="quest-short_description" class="col-sm-3 control-label">Краткое описание</label>

                        <div class="col-sm-6">
                            <textarea name="short_description" id="quest-short_description" class="form-control"></textarea>               
                        </div>
                    </div>
                    <!--Полное описание квеста-->
                    <div class="form-group">
                        <label for="quest-description" class="col-sm-3 control-label">Полное описание</label>

                        <div class="col-sm-6">
                            <textarea name="description" id="quest-description" class="form-control"></textarea>
                        </div>
                    </div>
                    <!--Фото квеста-->
                    <div class="form-group">
                        <label for="photo" class="col-md-4 control-label">Изображение квеста</label>
                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control" name="photo">
                        </div>
                    </div>
                    <!--Ответ-->
                    <div class="form-group">
                        <label for="quest-answer" class="col-sm-3 control-label">Ответ</label>

                        <div class="col-sm-6">
                            <input type="text" name="answer" id="quest-answer" class="form-control">
                        </div>
                    </div>
                    <!--Время для квеста-->
                    <div class="form-group">
                        <label for="quest-time" class="col-sm-3 control-label">Время для выполнения квеста</label>

                        <div class="col-sm-6">
                            <input type="number" name="execution_time" id="quest-time" class="form-control">
                        </div>
                    </div>
                    <!--Публикаця-->
                    <div class="form-group">
                        <label><input type="radio" name="draft" id="quest-draft" class="form-control" checked>Черновик</label>
                        <label><input type="radio" name="publish" id="quest-publish" class="form-control">Опубликовать</label>
                    </div>
                    <!--Кнопка создания квеста-->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i> + Создать
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
