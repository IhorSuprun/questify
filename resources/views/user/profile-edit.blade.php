@extends('layout.user')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Редактирование профиля</div>
                <form action="{{ url(route('user.profile-update',['user'=>$user->name])) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">New Password</label>

                        <div class="col-sm-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label for="user" class="col-sm-3 control-label">Фото</label>

                        <div class="col-sm-6">
                            <input type="text" name="photo" id="user-photo" class="form-control" value="{{$user->photo}}">
                        </div>
                    </div>-->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Сохранить изменения
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection