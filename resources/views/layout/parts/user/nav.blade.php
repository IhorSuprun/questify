<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('user.main') }}">Questify</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quest.all') }}">Все квесты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.questsinprocess', ['user'=>$user->name]) }}">Выполняемые квесты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.questsfinished', ['user'=>$user->name]) }}">Завершенные квесты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.questsfailed', ['user'=>$user->name]) }}">Проваленные квесты</a>
            </li>

            <li class="nav-item">
<!--                Проверка на возможность создания квестов данным пользователем-->
                @if($user->author === 1)
                <a class="nav-link" href="{{ route('quest.add', ['user'=>$user->name]) }}">+ Создать квест</a>
                @else
                <a class="nav-link disabled" href="">+ Создать квест</a>
                @endif
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$user->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.profile', ['user'=>$user->name]) }}">Профиль</a>
                    <a class="dropdown-item" href="{{ route('user.quests', ['user'=>$user->name]) }}">Мои квесты</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">Выйти</a>
                </div>
            </li>
        </ul>

        <!--    <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>-->
    </div>
</nav>