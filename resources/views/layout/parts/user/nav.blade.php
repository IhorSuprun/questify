<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Questify</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
	<ul class="navbar-nav mr-auto">
	    <li class="nav-item active">
		<a class="nav-link" href="#">Мои квесты <span class="sr-only">(current)</span></a>
	    </li>
	    <li class="nav-item">
		<a class="nav-link" href="#">Link</a>
	    </li>

	    <li class="nav-item">
		<a class="nav-link disabled" href="#">Disabled</a>
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