@extends('layouts.app')

@section('title', $categoryTitle . ' - Аренда инструмента')

@section('content')
    <div class="catalog-page">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/') }}#catalog"">Каталог</a></li>
                <li class="breadcrumb-item active">{{ $categoryTitle }}</li>
            </ol>
        </nav>

        <div class="page-header">
            <h1>{{ $categoryTitle }}</h1>
            <p class="subtitle">{{ $categoryDescription }}</p>
        </div>

        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" onerror="this.src='https://via.placeholder.com/300x200?text=Изображение'">
                    </div>
                    <div class="product-info">
                        <h3>{{ $product['name'] }}</h3>
                        <div class="product-price">{{ intval($product['price']) }} ₽/сутки</div>
                        <div class="product-actions">
                            @auth
                                <button class="btn-rent"
                                        onclick="openRentalModal({{ $product['id'] }}, '{{ $product['name'] }}', {{ $product['price'] }})">
                                    Взять в аренду
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="btn-rent" style="text-decoration: none; display: inline-block;">
                                    Взять в аренду
                                </a>
                            @endauth
                            <button class="btn-details">Подробнее</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Модальное окно аренды -->
    <div id="rentalModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ваш заказ:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="order-summary mb-3">
                        <strong id="modal-product-name"></strong>
                        <div class="product-price-modal" id="modal-product-price"></div>
                    </div>

                    <p class="mb-3">Выберите даты получения и возврата</p>

                    <div class="row date-inputs mb-3">
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Дата получения</label>
                            <input type="date" class="form-control" id="start-date">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Дата возврата</label>
                            <input type="date" class="form-control" id="end-date">
                        </div>
                    </div>

                    <div class="delivery-options mb-3">
                        <p class="mb-2">Доставка (бесплатно от 5000р)</p>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="delivery" id="pickup" value="pickup" checked>
                            <label class="form-check-label" for="pickup">Самовывоз</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="delivery" id="courier" value="courier">
                            <label class="form-check-label" for="courier">Курьером до двери (с 9-00 до 20-00)</label>
                        </div>
                    </div>

                    <div class="total-sum mt-3 p-3 bg-light rounded">
                        <strong>Итоговая сумма: <span id="total-amount">0</span> ₽</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary" onclick="confirmRental()">Оформить аренду</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentProduct = null;

        function openRentalModal(id, name, price) {
            // Проверка авторизации
            @if(!auth()->check())
                window.location.href = '{{ route("login") }}';
            return;
            @endif

            console.log('Opening modal:', name, price);
            currentProduct = { id, name, price };

            document.getElementById('modal-product-name').textContent = name;
            document.getElementById('modal-product-price').textContent = price + ' ₽/сутки';
            document.getElementById('total-amount').textContent = price;

            // Устанавливаем минимальную дату - сегодня
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('start-date').min = today;
            document.getElementById('end-date').min = today;

            // Сбрасываем значения дат
            document.getElementById('start-date').value = '';
            document.getElementById('end-date').value = '';

            // Показываем модальное окно
            const modal = new bootstrap.Modal(document.getElementById('rentalModal'));
            modal.show();
        }

        function updateTotal() {
            const startDate = new Date(document.getElementById('start-date').value);
            const endDate = new Date(document.getElementById('end-date').value);

            if (startDate && endDate && endDate > startDate && currentProduct) {
                const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
                const total = days * currentProduct.price;
                document.getElementById('total-amount').textContent = total;
            }
        }

        function confirmRental() {
            // Дополнительная проверка авторизации
            @if(!auth()->check())
                window.location.href = '{{ route("login") }}';
            return;
            @endif

            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;

            if (!startDate || !endDate) {
                alert('Пожалуйста, выберите даты получения и возврата');
                return;
            }

            if (new Date(endDate) <= new Date(startDate)) {
                alert('Дата возврата должна быть позже даты получения');
                return;
            }

            const days = Math.ceil((new Date(endDate) - new Date(startDate)) / (1000 * 60 * 60 * 24));
            const totalAmount = days * currentProduct.price;
            const deliveryType = document.querySelector('input[name="delivery"]:checked').value;

            // Сохраняем аренду в localStorage
            const rental = {
                id: Date.now(),
                productName: currentProduct.name,
                productPrice: currentProduct.price,
                startDate: startDate,
                endDate: endDate,
                days: days,
                totalAmount: totalAmount,
                deliveryType: deliveryType,
                status: 'active',
                // Добавляем timestamp для автоматического удаления (+1 день после возврата)
                expiresAt: new Date(endDate).getTime() + (24 * 60 * 60 * 1000)
            };

            saveRentalToHistory(rental);

            alert('Аренда успешно оформлена!\n\nТовар: ' + currentProduct.name +
                '\nПериод: ' + days + ' дней' +
                '\nСумма: ' + totalAmount + ' ₽');

            // Закрываем модальное окно
            const modal = bootstrap.Modal.getInstance(document.getElementById('rentalModal'));
            modal.hide();
        }

        function saveRentalToHistory(rental) {
            let rentalHistory = JSON.parse(localStorage.getItem('rentalHistory') || '[]');
            rentalHistory.unshift(rental);
            localStorage.setItem('rentalHistory', JSON.stringify(rentalHistory));
        }

        // Назначаем обработчики после загрузки DOM
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded');
            document.getElementById('start-date').addEventListener('change', updateTotal);
            document.getElementById('end-date').addEventListener('change', updateTotal);
        });
    </script>
@endsection
