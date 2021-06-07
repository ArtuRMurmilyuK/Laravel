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
                
                
                @if (\Auth::user()->admin)
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Стена </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('friend.index')}}">Друзья</a>
                </li>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Admin Panel
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('events.index')}}">Мероприятия </a>
                    <a class="dropdown-item" href="{{route('users.index')}}">Пользователи </a>
                </div>
            </div>
                    
                @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Стена </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('friend.index')}}">Друзья</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('events.index')}}">Мероприятия </a>
                </li>
                @endif
                
                <form method="GET" action="{{route('search.results')}}" class="form-inline my-2 ml-2 my-lg-0">
                    <input name="query" class="form-control mr-sm-2" type="search" placeholder="Что ищем?" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Найти</button>
                </form>
            </ul>
             @endif 
            <ul class="navbar-nav ml-auto">
            @if(Auth::check())
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->getFirstNameOrUsername()}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
             
                <a href="{{route('profile.index', ['username' => Auth::user()->username])}}" class="dropdown-item">{{ Auth::user()->getNameOrUsername()}}</a>
                <a class="dropdown-item" href="{{ route('profile.edit') }}" >Обновить профиль</a>
                <a href="{{route('auth.signout')}}" class="dropdown-item">Выйти</a>
            
        </div>
    </div>
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