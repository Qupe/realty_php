<header class="header">
    <div class="header__wrap">
        <div class="container">
            <div class="header__line pull-left">
                <a href="/agencies">Агентства</a>
                <a href="/realtors">Риэлторы</a>
                <a href="/developers">Застройщики</a>
            </div>
            <div class="header__line pull-right">
                @if (Auth::guest())
                    <a href="/login">Вход</a>
                    <a href="/register">Регистрация</a>
                @else
                    <a href="/profile">{{ Auth::user()->name }}</a>
                    <a href="/logout">Выйти</a>
                @endif
            </div>
        </div>
    </div>
    @include('blocks.navbar.navbar')
</header>