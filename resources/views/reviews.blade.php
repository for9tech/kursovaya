@extends('layouts.app')

@section('title', 'Отзывы - Аренда инструментов')

@section('content')
    <div class="reviews-page">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Отзывы</li>
            </ol>
        </nav>

        <div class="page-header">
            <h1>Отзывы клиентов</h1>
            <p class="subtitle">Что говорят наши клиенты о сотрудничестве с нами</p>
        </div>

        <div class="reviews-content">
            <div class="reviews-stats">
                <div class="stat-card">
                    <div class="stat-number">4.9</div>
                    <div class="stat-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="stat-label">Средняя оценка</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">127</div>
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-label">Довольных клиентов</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">98%</div>
                    <div class="stat-icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                    <div class="stat-label">Рекомендуют нас</div>
                </div>
            </div>

            <div class="reviews-grid">
                <!-- Отзыв 1 -->
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="reviewer-info">
                            <h4>Александр Петров</h4>
                            <div class="review-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="review-content">
                        <p>Брал в аренду бензогенератор на 3 дня для стройки. Оборудование в отличном состоянии, доставили вовремя. Цены адекватные, сервис на высоте! Теперь только к вам!</p>
                    </div>
                    <div class="review-footer">
                        <span class="review-date">15 ноября 2024</span>
                        <span class="review-category">Бензогенераторы</span>
                    </div>
                </div>

                <!-- Отзыв 2 -->
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="reviewer-info">
                            <h4>Марина Иванова</h4>
                            <div class="review-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="review-content">
                        <p>Пользуюсь услугами аренды уже больше года для своего ремонтного бизнеса. Всегда находят нужный инструмент, даже редкий. Отдельное спасибо за консультации!</p>
                    </div>
                    <div class="review-footer">
                        <span class="review-date">10 ноября 2024</span>
                        <span class="review-category">Разные инструменты</span>
                    </div>
                </div>

                <!-- Отзыв 3 -->
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="reviewer-info">
                            <h4>Дмитрий Семенов</h4>
                            <div class="review-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="review-content">
                        <p>Арендовал сварочный аппарат для гаража. Цена порадовала, оборудование современное. Небольшая задержка с доставкой, но оперативно извинились и сделали скидку.</p>
                    </div>
                    <div class="review-footer">
                        <span class="review-date">5 ноября 2024</span>
                        <span class="review-category">Сварочное оборудование</span>
                    </div>
                </div>

                <!-- Отзыв 4 -->
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="reviewer-info">
                            <h4>Ольга Козлова</h4>
                            <div class="review-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="review-content">
                        <p>Нужно было срочно сделать замеры в квартире. Взяла лазерный уровень на выходные. Очень удобно, что есть краткосрочная аренда. Инструмент точный, инструктаж понятный.</p>
                    </div>
                    <div class="review-footer">
                        <span class="review-date">1 ноября 2024</span>
                        <span class="review-category">Измерительные приборы</span>
                    </div>
                </div>

                <!-- Отзыв 5 -->
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="reviewer-info">
                            <h4>Сергей Волков</h4>
                            <div class="review-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="review-content">
                        <p>Строим дом, постоянно берем разные инструменты. От перфораторов до бетономешалок. Все работает как часы, поломок ни разу не было. Экономим на покупке оборудования!</p>
                    </div>
                    <div class="review-footer">
                        <span class="review-date">28 октября 2024</span>
                        <span class="review-category">Строительные инструменты</span>
                    </div>
                </div>

                <!-- Отзыв 6 -->
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="reviewer-info">
                            <h4>Ирина Смирнова</h4>
                            <div class="review-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="review-content">
                        <p>Заказывала садовый измельчитель для дачи. Привезли прямо на участок, все показали как работать. Цены ниже чем у конкурентов, а сервис лучше. Буду рекомендовать соседям!</p>
                    </div>
                    <div class="review-footer">
                        <span class="review-date">25 октября 2024</span>
                        <span class="review-category">Садовая техника</span>
                    </div>
                </div>
            </div>

            <!-- Призыв к действию -->

        </div>
    </div>

    <style>
        .reviews-page {
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

        .reviews-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(230, 166, 69, 0.1);
            border-top: 4px solid #E6A645;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #E6A645;
            margin-bottom: 10px;
        }

        .stat-stars {
            color: #E6A645;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .stat-icon {
            color: #E6A645;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #7f8c8d;
            font-size: 1rem;
        }

        .reviews-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .review-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(230, 166, 69, 0.1);
            border: 1px solid #f0f0f0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(230, 166, 69, 0.2);
        }

        .review-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .reviewer-avatar {
            width: 50px;
            height: 50px;
            background: #E6A645;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 1.2rem;
        }

        .reviewer-info h4 {
            margin: 0;
            color: #2c3e50;
            font-size: 1.1rem;
        }

        .review-rating {
            color: #E6A645;
            margin-top: 5px;
        }

        .review-content {
            margin-bottom: 15px;
        }

        .review-content p {
            color: #555;
            line-height: 1.6;
            margin: 0;
            font-size: 1rem;
        }

        .review-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }

        .review-date {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .review-category {
            background: #E6A645;
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .cta-section {
            background: linear-gradient(135deg, #E6A645 0%, #d1943a 100%);
            border-radius: 15px;
            padding: 50px;
            text-align: center;
            color: white;
        }

        .cta-content h3 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .cta-content p {
            font-size: 1.2rem;
            margin-bottom: 25px;
            opacity: 0.9;
        }

        .btn-cta {
            background: white;
            color: #E6A645;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            transition: transform 0.3s ease;
            display: inline-block;
        }

        .btn-cta:hover {
            transform: translateY(-2px);
            color: #d1943a;
        }

    </style>
@endsection
