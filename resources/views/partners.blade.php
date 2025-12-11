@extends('layouts.app')

@section('title', 'Партнерам - Сотрудничество')

@section('content')
    <div class="partners-page">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Партнерам</li>
            </ol>
        </nav>

        <div class="page-header">
            <h1>Сотрудничество</h1>
            <p class="subtitle">Развиваем бизнес вместе</p>
        </div>

        <div class="partners-content">
            <!-- Секция 1: Субаренда -->
            <div class="partner-section">
                <div class="partner-header">
                    <div class="partner-number">1</div>
                    <h2>СУБАРЕНДА</h2>
                </div>
                <div class="partner-card">
                    <div class="partner-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="partner-text">
                        <h3>Занимаетесь строительством?</h3>
                        <p>На складах полно строительного оборудования, которым давно уже не пользуетесь?</p>
                        <p>Можете сдавать его в аренду через наш сервис. Зарабатывайте вместе с нами.</p>
                        <div class="contact-info">
                            <strong>По всем вопросам пишите:</strong>
                            <a href="mailto:primer@mail.ru" class="email-link">primer@mail.ru</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Секция 2: Выкуп оборудования -->
            <div class="partner-section">
                <div class="partner-header">
                    <div class="partner-number">2</div>
                    <h2>ВЫКУП СТРОИТЕЛЬНОГО ОБОРУДОВАНИЯ</h2>
                </div>
                <div class="partner-card">
                    <div class="partner-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="partner-text">
                        <p>Есть ненужное оборудование или инструмент? Присылайте фото и описание на primer@mail.ru.</p>
                        <p>Постараемся предложить Вам лучшую цену выкупа.</p>
                        <div class="contact-info">
                            <strong>Контакт для выкупа:</strong>
                            <a href="mailto:primer@mail.ru" class="email-link">primer@mail.ru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .partners-page {
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
        }

        .subtitle {
            color: #7f8c8d;
            font-size: 1.2rem;
        }

        .partner-section {
            margin-bottom: 60px;
        }

        .partner-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #E6A645;
            padding-bottom: 10px;
        }

        .partner-number {
            background: #E6A645;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .partner-header h2 {
            color: #555;
            margin: 0;
        }

        .partner-card {
            display: flex;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            align-items: flex-start;
            gap: 30px;
        }

        .partner-icon {
            flex-shrink: 0;
            width: 80px;
            height: 80px;
            background: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #E6A645;
        }

        .partner-text {
            flex: 1;
        }

        .partner-text h3 {
            color: #555;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .partner-text p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .contact-info {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #E6A645;
        }

        .email-link {
            color: #E6A645;
            text-decoration: none;
            font-weight: bold;
            margin-left: 10px;
        }

        .email-link:hover {
            text-decoration: underline;
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            .partner-card {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .partner-header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .partner-number {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .page-header h1 {
                font-size: 2rem;
            }
        }
    </style>
@endsection
