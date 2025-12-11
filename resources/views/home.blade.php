@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <section class="hero-section">
        <div class="content">
            <h1>Прокат и аренда<br>инструмента в<br>Челябинске</h1>
            <!-- You can add a subtitle or call to action here if needed -->
        </div>
    </section>

    <section class="features-section">
        <div class="feature-item">
            <div class="icon">
                <img src="/images/pic1.png" alt="Icon 1"> <!-- Replace with your icon -->
            </div>
            <p>Без залога</p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <img src="/images/pic2.png" alt="Icon 2"> <!-- Replace with your icon -->
            </div>
            <p>Без выходных</p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <img src="/images/pic3.png" alt="Icon 3"> <!-- Replace with your icon -->
            </div>
            <p>Скидка за отзыв</p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <img src="/images/pic4.png" alt="Icon 4"> <!-- Replace with your icon -->
            </div>
            <p>Инструмент<br>на гарантии</p>
        </div>
    </section>
    <section id="catalog">
        <section class="catalog-section" >
            <h2>Каталог проката</h2>
            <div class="catalog-grid-wrapper">
                <div class="catalog-grid">
                    <div class="catalog-item">
                        <div class="background-image1"></div>
                        <div class="content-text">
                            <a href="{{ route('catalog.category', 'garden') }}" class="text-box">Садовая<br>Техника</a>
                        </div>
                    </div>
                    <div class="catalog-item">
                        <div class="background-image2"></div>
                        <div class="content-text">
                            <a href="{{ route('catalog.category', 'measuring') }}" class="text-box">Измерительный<br>Инструмент</a>
                        </div>
                    </div>
                    <div class="catalog-item">
                        <div class="background-image3"></div>
                        <div class="content-text">
                            <a href="{{ route('catalog.category', 'workwear') }}" class="text-box">Спецодежда</a>
                        </div>
                    </div>
                    <div class="catalog-item">
                        <div class="background-image4"></div>
                        <div class="content-text">
                            <a href="{{ route('catalog.category', 'welders') }}" class="text-box">Сварочное<br>Оборудование</a>
                        </div>
                    </div>
                    <div class="catalog-item">
                        <div class="background-image5"></div>
                        <div class="content-text">
                            <a href="{{ route('catalog.category', 'generators') }}" class="text-box">Бензогенераторы</a>
                        </div>
                    </div>
                    <div class="catalog-item">
                        <div class="background-image6"></div>
                        <div class="content-text">
                            <a href="{{ route('catalog.category', 'grinders') }}" class="text-box">УШМ<br>Болгарки</a>
                        </div>
                    </div>
                    <div class="catalog-item">
                        <div class="background-image7"></div>
                        <div class="content-text">
                            <a href="{{ route('catalog.category', 'perforators') }}" class="text-box">Перфораторы</a>
                        </div>
                    </div>
                    <div class="catalog-item">
                        <div class="background-image8"></div>
                        <div class="content-text">
                            <a href="{{ route('catalog.category', 'saws') }}" class="text-box">Электропилы</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
    </section>

        <div class="reviews-slider">
            <div class="reviews-slides">
                <!-- Слайд 1 -->
                <div class="review-slide active">
                    <div class="review-content">
                        <div class="review-text">“Быстро, качественно, профессионально! Решили все наши проблемы в кратчайшие сроки. Обязательно будем обращаться еще.”</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Мария Петрова</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Слайд 2 -->
                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">“Отличный сервис! Команда профессионалов, которые знают свое дело. Цены адекватные, сроки соблюдаются. Приятно работать с такими людьми.”</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Алексей Сидоров</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Слайд 3 -->
                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">“Очень доволен работой! Качество обслуживания на высшем уровне. Рекомендую всем своим друзьям и коллегам.”</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Иван Иванов</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Слайд 4 -->
                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">“Прекрасный опыт сотрудничества! Все было сделано вовремя и качественно. Обязательно продолжим работать вместе.”</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Елена Смирнова</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Слайд 5 -->
                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">“Впечатлен скоростью работы и вниманием к деталям. Профессионалы своего дела!”</div>
                        <div class="review-author">
                            <div class="author-info">
                                <div class="author-name">Дмитрий Козлов</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Слайд 6 -->
                <div class="review-slide">
                    <div class="review-content">
                        <div class="review-text">“Качественная работа, ответственный подход. Рекомендую как надежного партнера.”</div>
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
@endsection
