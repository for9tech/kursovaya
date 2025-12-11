<footer class="footer">
    <div class="footer-content">
        <div class="footer-column">
            <div class="logo-block">
                <img src="{{ asset('images/logo.png') }}" alt="Логотип">
                <div class="company-name">Аренда инструмента</div>
            </div>
            <div class="contact-block">
                <div class="contact-phone">+7 (951) 777-77-77</div>
                <div class="contact-address">Челябинск, ул. Промышленная, 15</div>
                <div class="contact-email">info@arendainstrumenta.ru</div>
            </div>
        </div>

        <div class="footer-column">
            <a href="/catalog/garden" class="footer-link">Садовая Техника</a>
            <a href="/catalog/measuring" class="footer-link">Измерительные приборы</a>
            <a href="/catalog/workwear" class="footer-link">Спецодежда</a>
            <a href="/catalog/welders" class="footer-link">Сварочное Оборудование</a>
            <a href="/catalog/generators" class="footer-link">Бензогенераторы</a>
            <a href="/catalog/grinders" class="footer-link">УШМ Болгарки</a>
            <a href="/catalog/perforators" class="footer-link">Перфораторы</a>
            <a href="/catalog/saws" class="footer-link">Электропилы</a>
        </div>

        <div class="footer-column">
            <div class="column-title">Компания</div>
            <a href="{{ route('news') }}">Новости</a>
            <a href="{{ route('contacts') }}">Контакты</a>
        </div>

        <div class="footer-column">
            <div class="column-title">Информация</div>
            <div class="work-hours">
                <div class="hours-item">Пн-Пт: 8:00-20:00</div>
                <div class="hours-item">Сб-Вс: 9:00-18:00</div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="copyright">© 2025 Аренда инструмента. Челябинск</div>
    </div>
</footer>
