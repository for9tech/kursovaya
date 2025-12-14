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
                <img src="{{ asset('images/profile.png') }}" alt="Личный кабинет">
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

    <!-- Бургер-меню для мобильных -->
    <button class="burger-menu" id="burgerBtn">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>

<!-- Мобильное меню -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-content">
        <nav class="mobile-nav">
            <a href="{{ route('news') }}" onclick="closeMenu()">Новости</a>
            <a href="{{ url('/') }}#catalog" onclick="closeMenu()">Каталог</a>
            <a href="{{ route('partners') }}" onclick="closeMenu()">Партнерам</a>
            <a href="{{ route('contacts') }}" onclick="closeMenu()">Контакты</a>
            <a href="{{ route('reviews') }}" onclick="closeMenu()">Отзывы</a>
        </nav>

        <div class="mobile-auth-section">
            @auth
                <div class="mobile-user-info">
                    <span class="mobile-user-greeting">Привет, {{ Auth::user()->name }}!</span>
                    <div class="mobile-user-icons">
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="mobile-admin-icon" title="Админ панель" onclick="closeMenu()">
                                <img src="{{ asset('images/admin-icon.png') }}" alt="Админ">
                                <span class="mobile-icon-text">Админ</span>
                            </a>
                        @endif
                        <a href="{{ route('profile') }}" class="mobile-enter" title="Личный кабинет" onclick="closeMenu()">
                            <img src="{{ asset('images/profile.png') }}" alt="Личный кабинет">
                            <span class="mobile-icon-text">Профиль</span>
                        </a>
                        <a href="#" class="mobile-logout-icon" onclick="document.getElementById('logout-form').submit(); closeMenu();" title="Выйти">
                            <img src="{{ asset('images/logout-white.png') }}" alt="Выйти">
                            <span class="mobile-icon-text">Выйти</span>
                        </a>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="mobile-enter" title="Войти" onclick="closeMenu()">
                    <img src="{{ asset('images/enter.png') }}" alt="Войти">
                    <span class="mobile-icon-text">Войти</span>
                </a>
            @endauth
        </div>
    </div>
</div>

<style>


    /* Бургер-меню кнопка (скрыта на десктопе) */
    .burger-menu {
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 21px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
        z-index: 1000;
    }

    .burger-menu span {
        width: 100%;
        height: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 2px;
    }

    /* Мобильное меню */
    .mobile-menu {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.95);
        z-index: 999;
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }

    .mobile-menu.active {
        transform: translateX(0);
    }

    .mobile-menu-content {
        padding: 80px 20px 40px;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .mobile-nav {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-bottom: 40px;
    }

    .mobile-nav a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        padding: 10px 0;
        border-bottom: 1px solid #333;
    }

    .mobile-auth-section {
        margin-top: auto;
        padding-top: 20px;
        border-top: 1px solid #333;
    }

    .mobile-user-info {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .mobile-user-greeting {
        font-size: 16px;
        color: #ccc;
    }

    .mobile-user-icons {
        display: flex;
        gap: 25px;
        align-items: center;
    }

    .mobile-user-icons a {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .mobile-user-icons img {
        width: 35px;
        height: 35px;
    }

    .mobile-icon-text {
        color: white;
        font-size: 12px;
    }

    .mobile-enter {
        display: flex;
        align-items: center;
        gap: 15px;
        color: white;
        text-decoration: none;
        font-size: 16px;
    }

    .mobile-enter img {
        width: 35px;
        height: 35px;
    }

    /* Адаптивность - на мобильных показываем только лого и бургер */
    @media (max-width: 768px) {
        .nav,
        .user-menu,
        .enter,
        .user-greeting {
            display: none !important; /* Скрываем всё кроме лого */
        }

        .burger-menu {
            display: flex; /* Показываем бургер */
        }

        .mobile-menu {
            display: block; /* Показываем меню */
        }

        .header {
            padding: 12px 15px;
            justify-content: space-between; /* Лого слева, бургер справа */
        }

        .logo img {
            height: 50px;
        }
    }

    @media (max-width: 480px) {
        .logo img {
            height: 40px;
        }

        .burger-menu {
            width: 28px;
            height: 19px;
        }
    }

    /* Анимация бургер-кнопки */
    .burger-menu.active span:nth-child(1) {
        transform: translateY(9px) rotate(45deg);
    }

    .burger-menu.active span:nth-child(2) {
        opacity: 0;
    }

    .burger-menu.active span:nth-child(3) {
        transform: translateY(-9px) rotate(-45deg);
    }

    /* Для десктопа - бургер скрыт */
    @media (min-width: 769px) {
        .burger-menu,
        .mobile-menu {
            display: none !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const burgerBtn = document.getElementById('burgerBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        function toggleMenu() {
            burgerBtn.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
        }

        function closeMenu() {
            burgerBtn.classList.remove('active');
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        }

        burgerBtn.addEventListener('click', toggleMenu);

        // Закрытие меню при клике на ссылку
        const mobileLinks = document.querySelectorAll('.mobile-nav a, .mobile-auth-section a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // Закрытие меню при клике вне меню
        mobileMenu.addEventListener('click', function(e) {
            if (e.target === mobileMenu) {
                closeMenu();
            }
        });

        // Закрытие меню при ресайзе на десктоп
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                closeMenu();
            }
        });

        // Закрытие меню при нажатии ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMenu();
            }
        });
    });
</script>
