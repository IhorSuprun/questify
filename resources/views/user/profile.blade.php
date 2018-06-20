@extends('layout.user')
@section('content')
<div class="container">
    <div class="container wordwrap">
        <div id="personal-bl" class="card card-indent ">
            <div class="row">
                <div class="col-sm-6">
                    <h2 id="personal">Личные данные</h2>
                    <dl class="dl-horizontal">
                        <dt>Name:</dt>
                        <dd><b>{{$user->name}} </b></dd>
                        <dt>Created at:</dt>
                        <dd>{{$user->created_at}}</dd>
                        <dt>Rating:</dt>
                        <dd>{{$user->rating}}</dd>
                        <dt>Email:</dt>
                        <dd>{{$user->email}}</dd>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h2 id="photo">Фотография</h2>
                    <p class="avatar">
                        <img src="{{asset('storage/'.$user->photo)}}"  alt="user_photo" class="border"style="width: 100px;height: 100px;border-radius: 50%;"/>                     
                    </p>
                    @if($auth_user === $user->name)
                    <a href="#">
                        <button type="submit" class="btn btn-primary">Изменить</button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @if($auth_user === $user->name)
        <a href="profile/edit">
            <button type="submit" class="btn btn-warning">Редактировать</button>
        </a>
        @endif
    </div>
</div>

@endsection