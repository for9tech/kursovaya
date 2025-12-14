@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <section class="hero-section">
        <div class="content">
            <h1>Прокат и аренда<br>инструмента в<br>Челябинске</h1>
        </div>
    </section>

    <section class="features-section">
        <div class="feature-item">
            <div class="icon">
                <img src="/images/pic1.png" alt="Icon 1">
            </div>
            <p>Без залога</p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <img src="/images/pic2.png" alt="Icon 2">
            </div>
            <p>Без выходных</p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <img src="/images/pic3.png" alt="Icon 3">
            </div>
            <p>Скидка за отзыв</p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <img src="/images/pic4.png" alt="Icon 4">
            </div>
            <p>Инструмент<br>на гарантии</p>
        </div>
    </section>

    <section id="catalog">
        <section class="catalog-section">
            <h2>Каталог проката</h2>
            <div class="catalog-grid-wrapper">
                <div class="catalog-grid">
                    <a href="{{ route('catalog.category', 'garden') }}" class="catalog-item">
                        <div class="background-image1"></div>
                        <div class="content-text">
                            <div class="text-box">Садовая<br>Техника</div>
                        </div>
                    </a>

                    <a href="{{ route('catalog.category', 'measuring') }}" class="catalog-item">
                        <div class="background-image2"></div>
                        <div class="content-text">
                            <div class="text-box">Измерительный<br>Инструмент</div>
                        </div>
                    </a>

                    <a href="{{ route('catalog.category', 'workwear') }}" class="catalog-item">
                        <div class="background-image3"></div>
                        <div class="content-text">
                            <div class="text-box">Спецодежда</div>
                        </div>
                    </a>

                    <a href="{{ route('catalog.category', 'welders') }}" class="catalog-item">
                        <div class="background-image4"></div>
                        <div class="content-text">
                            <div class="text-box">Сварочное<br>Оборудование</div>
                        </div>
                    </a>

                    <a href="{{ route('catalog.category', 'generators') }}" class="catalog-item">
                        <div class="background-image5"></div>
                        <div class="content-text">
                            <div class="text-box">Бензогенераторы</div>
                        </div>
                    </a>

                    <a href="{{ route('catalog.category', 'grinders') }}" class="catalog-item">
                        <div class="background-image6"></div>
                        <div class="content-text">
                            <div class="text-box">УШМ<br>Болгарки</div>
                        </div>
                    </a>

                    <a href="{{ route('catalog.category', 'perforators') }}" class="catalog-item">
                        <div class="background-image7"></div>
                        <div class="content-text">
                            <div class="text-box">Перфораторы</div>
                        </div>
                    </a>

                    <a href="{{ route('catalog.category', 'saws') }}" class="catalog-item">
                        <div class="background-image8"></div>
                        <div class="content-text">
                            <div class="text-box">Электропилы</div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </section>

    <section>
        <div class="reviews-slider">
            <div class="reviews-slides">
                <div class="review-slide active">
                    <div class="review-content">
                        <div class="review-text">"Быстро, качественно, профессионально! Решили все наши проблемы в кратчайшие сроки. Обязательно будем обращаться еще."</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Мария Петрова</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">"Отличный сервис! Команда профессионалов, которые знают свое дело. Цены адекватные, сроки соблюдаются. Приятно работать с такими людьми."</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Алексей Сидоров</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">"Очень доволен работой! Качество обслуживания на высшем уровне. Рекомендую всем своим друзьям и коллегам."</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Иван Иванов</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">"Прекрасный опыт сотрудничества! Все было сделано вовремя и качественно. Обязательно продолжим работать вместе."</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Елена Смирнова</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">"Впечатлен скоростью работы и вниманием к деталям. Профессионалы своего дела!"</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Дмитрий Козлов</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">"Качественная работа, ответственный подход. Рекомендую как надежного партнера."</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Ольга Новикова</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="review-prev">‹</button>
            <button class="review-next">›</button>

            <div class="review-indicators">
                <span class="review-indicator active" data-slide="0"></span>
                <span class="review-indicator" data-slide="1"></span>
                <span class="review-indicator" data-slide="2"></span>
                <span class="review-indicator" data-slide="3"></span>
                <span class="review-indicator" data-slide="4"></span>
                <span class="review-indicator" data-slide="5"></span>
            </div>
        </div>
    </section>

    <style>
        /* ========== АДАПТИВ ДЛЯ ТЕЛЕФОНОВ (до 768px) ========== */
        @media (max-width: 768px) {
            /* ГЕРОЙ-СЕКЦИЯ с фоновым изображением */
            .hero-section {
                padding: 40px 20px !important;
                min-height: 60vh !important;
                text-align: center !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                position: relative !important;
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('/images/пупупу.jpg') center/cover no-repeat !important;
            }

            .hero-section h1 {
                font-size: 28px !important;
                line-height: 1.3 !important;
                color: white !important;
                font-weight: 700 !important;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.5) !important;
                margin: 0 !important;
                padding: 0 !important;
                position: relative !important;
                z-index: 2 !important;
            }

            /* Оставляем переносы как есть */
            .hero-section h1 br {
                display: block !important;
            }

            /* ОСОБЕННОСТИ (фичи) */
            .features-section {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 20px !important;
                padding: 40px 20px !important;
                background: #f8f9fa !important;
            }

            .feature-item {
                background: white !important;
                border-radius: 12px !important;
                padding: 20px 15px !important;
                text-align: center !important;
                box-shadow: 0 3px 10px rgba(0,0,0,0.05) !important;
                border: 1px solid #eee !important;
                transition: transform 0.3s !important;
            }

            .feature-item:hover {
                transform: translateY(-3px) !important;
            }

            .feature-item .icon {
                margin-bottom: 12px !important;
            }

            .feature-item .icon img {
                width: 50px !important;
                height: 50px !important;
                object-fit: contain !important;
            }

            .feature-item p {
                font-size: 15px !important;
                font-weight: 600 !important;
                color: #333 !important;
                line-height: 1.3 !important;
                margin: 0 !important;
            }

            .feature-item:nth-child(4) p {
                font-size: 14px !important;
                line-height: 1.2 !important;
            }

            /* КАТАЛОГ */
            .catalog-section {
                padding: 40px 20px !important;
            }

            .catalog-section h2 {
                font-size: 28px !important;
                text-align: center !important;
                margin-bottom: 30px !important;
                color: #2c3e50 !important;
                font-weight: 700 !important;
                position: relative !important;
            }

            .catalog-section h2::after {
                content: '' !important;
                display: block !important;
                width: 60px !important;
                height: 3px !important;
                background: #E6A645 !important;
                margin: 10px auto 0 !important;
                border-radius: 2px !important;
            }

            .catalog-grid {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 15px !important;
            }

            /* Карточки каталога */
            .catalog-item {
                background: white !important;
                border: 2px solid #E6A645 !important;
                border-radius: 12px !important;
                height: 150px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                text-align: center !important;
                padding: 20px 15px !important;
                text-decoration: none !important;
                position: relative !important;
                overflow: hidden !important;
                box-shadow: 0 4px 12px rgba(230, 166, 69, 0.15) !important;
                transition: all 0.3s ease !important;
            }

            .catalog-item:hover {
                transform: translateY(-3px) !important;
                box-shadow: 0 8px 20px rgba(230, 166, 69, 0.2) !important;
                background: #FFFBF4 !important;
            }

            /* Скрываем фоновые изображения на мобильных */
            .catalog-item [class*="background-image"] {
                display: none !important;
            }

            .catalog-item .content-text {
                padding: 0 !important;
                width: 100% !important;
                z-index: 2 !important;
                position: relative !important;
            }

            .text-box {
                font-size: 17px !important;
                font-weight: 700 !important;
                color: #000000 !important;
                line-height: 1.4 !important;
                text-align: center !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            .text-box br {
                display: block !important;
                margin-bottom: 5px !important;
            }

            .catalog-item:nth-child(2) .text-box {
                font-size: 16px !important;
            }

            .catalog-item:nth-child(4) .text-box,
            .catalog-item:nth-child(6) .text-box {
                font-size: 15px !important;
            }

            .catalog-item::before {
                content: '' !important;
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 4px !important;
                background: #E6A645 !important;
                z-index: 1 !important;
            }

            /* СЛАЙДЕР ОТЗЫВОВ - оставляем как было (только адаптив) */
            .reviews-slider {
                padding: 40px 20px !important;
                background: #f8f9fa !important;
                position: relative !important;
            }

            .review-slide {
                background: white !important;
                border-radius: 12px !important;
                box-shadow: 0 3px 10px rgba(0,0,0,0.08) !important;
                padding: 25px !important;
            }

            .review-text {
                font-size: 16px !important;
                line-height: 1.5 !important;
                color: #555 !important;
                margin-bottom: 20px !important;
            }

            .author-name {
                font-weight: 600 !important;
                color: #333 !important;
                font-size: 15px !important;
            }
        }

        /* ========== МАЛЕНЬКИЕ ТЕЛЕФОНЫ (до 480px) ========== */
        @media (max-width: 480px) {
            .hero-section {
                padding: 30px 15px !important;
                min-height: 50vh !important;
            }

            .hero-section h1 {
                font-size: 24px !important;
            }

            .features-section {
                gap: 15px !important;
                padding: 30px 15px !important;
                grid-template-columns: 1fr !important;
            }

            .feature-item {
                padding: 18px 15px !important;
            }

            .feature-item .icon img {
                width: 45px !important;
                height: 45px !important;
            }

            .feature-item p {
                font-size: 16px !important;
            }

            .feature-item:nth-child(4) p {
                font-size: 15px !important;
            }

            .catalog-section {
                padding: 30px 15px !important;
            }

            .catalog-section h2 {
                font-size: 24px !important;
            }

            .catalog-grid {
                gap: 12px !important;
                grid-template-columns: 1fr !important;
                max-width: 300px !important;
                margin: 0 auto !important;
            }

            .catalog-item {
                height: 140px !important;
                padding: 18px 15px !important;
            }

            .text-box {
                font-size: 18px !important;
            }

            .catalog-item:nth-child(2) .text-box {
                font-size: 17px !important;
            }

            .catalog-item:nth-child(4) .text-box,
            .catalog-item:nth-child(6) .text-box {
                font-size: 16px !important;
            }

            .reviews-slider {
                padding: 30px 15px !important;
            }

            .review-slide {
                padding: 20px !important;
            }

            .review-text {
                font-size: 15px !important;
            }
        }

        /* ========== ЛАНДШАФТНАЯ ОРИЕНТАЦИЯ ========== */
        @media (max-width: 768px) and (orientation: landscape) {
            .features-section {
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 15px !important;
            }

            .feature-item p {
                font-size: 14px !important;
            }

            .catalog-grid {
                grid-template-columns: repeat(3, 1fr) !important;
            }

            .catalog-item {
                height: 130px !important;
            }

            .text-box {
                font-size: 15px !important;
            }
        }
    </style>


@endsection
