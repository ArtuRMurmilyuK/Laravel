<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        @if(Auth::check())
        <a class="navbar-brand" href="{{ route('profile.index', ['username' =>Auth::user()->username]) }}">Dating Club "Cupid"</a>
        @else
        <a class="navbar-brand" href="{{ route('home') }}">Dating Club "Cupid"</a>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
             @if(Auth::check()) 
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Стена </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('friend.index')}}">Друзья</a>
                </li>
                <form method="GET" action="{{route('search.results')}}" class="form-inline my-2 ml-2 my-lg-0">
                    <input name="query" class="form-control mr-sm-2" type="search" placeholder="Что ищем?" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Найти</button>
                </form>
            </ul>
             @endif 
            <ul class="navbar-nav ml-auto">
            @if(Auth::check())
            <li class="nav-item "> 
                <a href="{{route('profile.index', ['username' => Auth::user()->username])}}" class="nav-link">{{ Auth::user()->getNameOrUsername()}}</a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('profile.edit') }}" class="nav-link">Обновить профиль</a>
            </li>
            <li class="nav-item">
                <a href="{{route('auth.signout')}}" class="nav-link">Выйти</a>
            </li>
            @else
            <li class="nav-item ">
                <a href="{{ route('auth.signup') }}" class="nav-link">Зарегистрироваться</a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('auth.signin') }}" class="nav-link">Войти</a>
            </li>
            @endif
            </ul>
        </div>
    </div>
</nav>