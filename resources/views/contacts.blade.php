@extends('layouts.app')

@section('title', 'Контакты - Аренда инструментов')

@section('content')
    <div class="contacts-page">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Контакты</li>
            </ol>
        </nav>

        <div class="page-header">
            <h1>Контакты</h1>
            <p class="subtitle">Свяжитесь с нами любым удобным способом</p>
        </div>

        <div class="contacts-content">
            <div class="row">
                <!-- Контактная информация -->
                <div class="col-md-6">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-info">
                            <h3>Телефон</h3>
                            <p>+7 (951) 777-77-77</p>
                            <span class="contact-note">Ежедневно с 8:00 до 20:00</span>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-info">
                            <h3>Email</h3>
                            <p>info@arenda-tools.ru</p>
                            <span class="contact-note">Ответим в течение 2 часов</span>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-info">
                            <h3>Адрес</h3>
                            <p>Челябинск, ул. Промышленная, 15</p>
                            <span class="contact-note">Самовывоз с 9:00 до 18:00</span>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-info">
                            <h3>Время работы</h3>
                            <p><strong>Пн-Пт:</strong> 8:00 - 20:00</p>
                            <p><strong>Сб-Вс:</strong> 9:00 - 18:00</p>
                        </div>
                    </div>
                </div>

                <!-- Форма обратной связи -->
                <div class="col-md-6">
                    <div class="contact-form-card">
                        <h3>Обратная связь</h3>
                        <p>Оставьте заявку и мы свяжемся с вами в ближайшее время</p>

                        <form class="contact-form">
                            <div class="form-group">
                                <label for="name">Ваше имя</label>
                                <input type="text" id="name" class="form-control" placeholder="Введите ваше имя">
                            </div>

                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="tel" id="phone" class="form-control" placeholder="+7 (___) ____-____">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="your@email.com">
                            </div>

                            <div class="form-group">
                                <label for="message">Сообщение</label>
                                <textarea id="message" class="form-control" rows="4" placeholder="Ваше сообщение..."></textarea>
                            </div>

                            <button type="submit" class="btn-submit">Отправить сообщение</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Карта -->

    </div>

    <style>
        .contacts-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .page-header h1 {
            color: #E6A645;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .subtitle {
            color: #7f8c8d;
            font-size: 1.2rem;
        }

        .contact-card {
            display: flex;
            align-items: flex-start;
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(230, 166, 69, 0.1);
            border-left: 4px solid #E6A645;
            transition: transform 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
        }

        .contact-icon {
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            background: #E6A645;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            font-size: 1.5rem;
        }

        .contact-info h3 {
            color: #E6A645;
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .contact-info p {
            color: #2c3e50;
            font-size: 1.1rem;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .contact-note {
            color: #7f8c8d;
            font-size: 0.9rem;
            font-style: italic;
        }

        .contact-form-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 3px 10px rgba(230, 166, 69, 0.1);
            border-top: 4px solid #E6A645;
            height: 100%;
        }

        .contact-form-card h3 {
            color: #E6A645;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        .contact-form-card p {
            color: #7f8c8d;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #2c3e50;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #E6A645;
        }

        .btn-submit {
            background: #E6A645;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s ease;
        }

        .btn-submit:hover {
            background: #d1943a;
        }
    </style>
@endsection
