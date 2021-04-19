<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home')}}">Dating Club "Cupid</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(Auth::check()) 
            <ul class="navbar-nav mr-auto">
                <li class="nav-item action">
                    <a class="nav-link " href="#">Стена</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Друзья</a>
                </li>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Кого ищем?" aria-label="Search">
                <button class="btn btn-success" type="submit">Найти</button>
            </form>
            </ul>
            @endif 
            <ul class="navbar-nav ml-auto">
            @if(Auth::check())
                <li class="nav-item"><a href="#" class="nav-link">{{Auth:user()->getNameOfUser()}}</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Обновить профиль</a></li>
                <li class="nav-item"><a href="/" class="nav-link">Выйти</a></li>
            @else
            <li class="nav-item "><a href="/" class="nav-link">Зарегистрироваться</a></li>
            <li class="nav-item"><a href="/" class="nav-link">Войти</a></li>
            @endif
            </ul>
        </div>
    </div>
</nav>