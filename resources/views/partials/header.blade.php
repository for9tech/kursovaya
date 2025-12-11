<header class="header">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
    </div>
    <nav class="nav">
        <a href="{{ route('news') }}">Новости</a>
        <a href="{{ url('/') }}#catalog">Каталог</a>
        <a href="{{ route('partners') }}">Партнерам</a>
        <a href="{{ route('contacts') }}">Контакты</a>
        <a href="{{ route('reviews') }}">Отзывы</a>
    </nav>

    @auth
        <div class="user-menu">
            @if(Auth::user()->is_admin)
                <!-- Иконка админки вместо текста -->
                <a href="{{ route('admin.dashboard') }}" class="admin-icon" title="Админ панель">
                    <img src="{{ asset('images/admin-icon.png') }}" alt="Админ" style="width: 50px; height: 50px;">
                </a>
            @endif

            <span class="user-greeting">Привет, {{ Auth::user()->name }}!</span>

            <!-- Иконка ведет в личный кабинет -->
            <a href="{{ route('profile') }}" class="enter" title="Личный кабинет">
                <img src="{{ asset('images/enter.png') }}" alt="Личный кабинет">
            </a>

            <!-- Форма выхода -->
            <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                @csrf
            </form>
            <a href="#" class="logout-icon" onclick="document.getElementById('logout-form').submit();" title="Выйти">
                <img src="{{ asset('images/logout.png') }}" alt="Выйти" class="logout-image">
            </a>
        </div>
    @else
        <!-- Для неавторизованных - ведет на страницу входа -->
        <a href="{{ route('login') }}" class="enter" title="Войти">
            <img src="{{ asset('images/enter.png') }}" alt="Войти">
        </a>
    @endauth
</header>
