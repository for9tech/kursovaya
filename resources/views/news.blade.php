@extends('layouts.app')

@section('title', 'Новости - Аренда инструмента')

@section('content')
    <div class="news-page">
        <!-- Хлебные крошки -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Новости</li>
            </ol>
        </nav>

        <!-- Заголовок -->
        <div class="page-header">
            <h1>Новости</h1>
        </div>


        <!-- Основной контент -->
        <div class="news-content">
            <!-- Первая новость - с изображением -->
            <div class="news-item featured">
                <div class="news-card">
                    <div class="news-header">
                        <h2>Открытие нового склада в промышленной зоне</h2>
                    </div>
                    <div class="news-body">
                        <p>Рады сообщить об открытии нашего нового склада площадью 800 м² в промышленной зоне. Теперь мы можем обслуживать еще больше клиентов и предлагать расширенный ассортимент оборудования.</p>
                    </div>
                    <div class="news-tags">
                        <span class="tag">НОВОСТИ</span>
                    </div>
                </div>
            </div>

            <!-- Вторая новость -->
            <div class="news-item">
                <div class="news-card">
                    <div class="news-header">
                        <h3>Обновление ассортимента</h3>
                    </div>
                    <div class="news-body">
                        <p>Обновление ассортимента в нашей компании!</p>
                        <p>Дорогие клиенты! Мы постоянно работаем над тем, чтобы предоставлять вам лучшее оборудование для строительства. Поэтому рады сообщить об обновлении ассортимента!</p>
                    </div>
                    <div class="news-meta">
                        <span class="news-category">НОВОСТИ</span>
                        <span class="news-date">18.03.25</span>
                    </div>
                </div>
            </div>

            <!-- Третья новость -->
            <div class="news-item">
                <div class="news-card">
                    <div class="news-header">
                        <h3>Много нового оборудования!</h3>
                    </div>
                    <div class="news-body">
                        <p>Мы готовы к сезону! А вы?</p>
                    </div>
                    <div class="news-meta">
                        <span class="news-category">НОВОСТИ</span>
                        <span class="news-date">20.05.20</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
