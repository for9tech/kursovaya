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
                            <label class="form-label">Дата получения <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="start-date" required>
                            <div class="invalid-feedback" id="start-date-error"></div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Дата возврата <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="end-date" required>
                            <div class="invalid-feedback" id="end-date-error"></div>
                        </div>
                        <div class="col-12">
                            <small class="text-muted">
                                <i class="bi bi-info-circle"></i> Минимум 1 день, максимум 90 дней аренды
                            </small>
                        </div>
                    </div>

                    <div class="delivery-options mb-3">
                        <p class="mb-2">Доставка <span class="text-muted">(+500 ₽, бесплатно от 5000 ₽)</span></p>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="delivery" id="pickup" value="pickup" checked onclick="updateTotal()">
                            <label class="form-check-label" for="pickup">Самовывоз</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="delivery" id="courier" value="courier" onclick="updateTotal()">
                            <label class="form-check-label" for="courier">Курьером до двери (с 9-00 до 20-00)</label>
                        </div>
                    </div>

                    <div class="total-sum mt-3 p-3 bg-light rounded">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Стоимость аренды:</span>
                            <span id="rental-amount">0 ₽</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Доставка:</span>
                            <span id="delivery-fee">0 ₽</span>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex justify-content-between">
                            <strong>Итоговая сумма:</strong>
                            <strong><span id="total-amount">0</span> ₽</strong>
                        </div>
                        <div id="free-delivery-message" class="text-success mt-2" style="display: none;">
                            <i class="bi bi-truck"></i> Доставка бесплатна
                        </div>
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
        const DELIVERY_FEE = 500; // Стоимость доставки
        const FREE_DELIVERY_THRESHOLD = 5000; // Порог бесплатной доставки
        const MAX_RENTAL_DAYS = 90; // Максимальный срок аренды
        const MIN_RENTAL_DAYS = 1; // Минимальный срок аренды

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

            // Устанавливаем минимальную и максимальную даты
            const today = new Date();
            const maxDate = new Date();
            maxDate.setDate(today.getDate() + 365); // Максимум на год вперед

            const todayStr = today.toISOString().split('T')[0];
            const maxDateStr = maxDate.toISOString().split('T')[0];

            const startDateInput = document.getElementById('start-date');
            startDateInput.min = todayStr;
            startDateInput.max = maxDateStr;

            const endDateInput = document.getElementById('end-date');
            endDateInput.min = todayStr;
            endDateInput.max = maxDateStr;

            // Сбрасываем значения
            startDateInput.value = '';
            endDateInput.value = '';
            document.getElementById('pickup').checked = true;

            // Сбрасываем ошибки
            resetErrors();

            // Обновляем итоговую сумму
            updateTotal();

            // Показываем модальное окно
            const modal = new bootstrap.Modal(document.getElementById('rentalModal'));
            modal.show();
        }

        function resetErrors() {
            document.getElementById('start-date').classList.remove('is-invalid');
            document.getElementById('end-date').classList.remove('is-invalid');
            document.getElementById('start-date-error').textContent = '';
            document.getElementById('end-date-error').textContent = '';
        }

        function validateDates() {
            resetErrors();
            let isValid = true;

            const startDateInput = document.getElementById('start-date');
            const endDateInput = document.getElementById('end-date');
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            // Проверка начальной даты
            if (!startDateInput.value) {
                startDateInput.classList.add('is-invalid');
                document.getElementById('start-date-error').textContent = 'Выберите дату получения';
                isValid = false;
            } else if (startDate < today) {
                startDateInput.classList.add('is-invalid');
                document.getElementById('start-date-error').textContent = 'Дата не может быть в прошлом';
                isValid = false;
            }

            // Проверка конечной даты
            if (!endDateInput.value) {
                endDateInput.classList.add('is-invalid');
                document.getElementById('end-date-error').textContent = 'Выберите дату возврата';
                isValid = false;
            } else if (startDateInput.value && endDate <= startDate) {
                endDateInput.classList.add('is-invalid');
                document.getElementById('end-date-error').textContent = 'Дата возврата должна быть позже даты получения';
                isValid = false;
            }

            // Проверка минимального и максимального периода
            if (startDateInput.value && endDateInput.value && endDate > startDate) {
                const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));

                if (days < MIN_RENTAL_DAYS) {
                    endDateInput.classList.add('is-invalid');
                    document.getElementById('end-date-error').textContent = `Минимальный срок аренды - ${MIN_RENTAL_DAYS} день`;
                    isValid = false;
                } else if (days > MAX_RENTAL_DAYS) {
                    endDateInput.classList.add('is-invalid');
                    document.getElementById('end-date-error').textContent = `Максимальный срок аренды - ${MAX_RENTAL_DAYS} дней`;
                    isValid = false;
                }
            }

            return isValid;
        }

        function updateTotal() {
            if (!validateDates() || !currentProduct) return;

            const startDate = new Date(document.getElementById('start-date').value);
            const endDate = new Date(document.getElementById('end-date').value);
            const deliveryType = document.querySelector('input[name="delivery"]:checked').value;

            // Расчет дней аренды
            const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
            const rentalAmount = days * currentProduct.price;

            // Расчет стоимости доставки
            let deliveryFee = 0;
            if (deliveryType === 'courier') {
                deliveryFee = rentalAmount >= FREE_DELIVERY_THRESHOLD ? 0 : DELIVERY_FEE;
            }

            // Итоговая сумма
            const totalAmount = rentalAmount + deliveryFee;

            // Обновляем отображение
            document.getElementById('rental-amount').textContent = rentalAmount + ' ₽';
            document.getElementById('delivery-fee').textContent = deliveryFee + ' ₽';
            document.getElementById('total-amount').textContent = totalAmount;

            // Показываем сообщение о бесплатной доставке
            const freeDeliveryMessage = document.getElementById('free-delivery-message');
            if (deliveryType === 'courier' && rentalAmount >= FREE_DELIVERY_THRESHOLD) {
                freeDeliveryMessage.style.display = 'block';
            } else {
                freeDeliveryMessage.style.display = 'none';
            }
        }

        function confirmRental() {
            // Дополнительная проверка авторизации
            @if(!auth()->check())
                window.location.href = '{{ route("login") }}';
            return;
            @endif

            // Проверка валидации дат
            if (!validateDates()) {
                alert('Пожалуйста, исправьте ошибки в выборе дат');
                return;
            }

            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;
            const deliveryType = document.querySelector('input[name="delivery"]:checked').value;

            // Расчет дней и сумм
            const days = Math.ceil((new Date(endDate) - new Date(startDate)) / (1000 * 60 * 60 * 24));
            const rentalAmount = days * currentProduct.price;
            let deliveryFee = 0;

            if (deliveryType === 'courier') {
                deliveryFee = rentalAmount >= FREE_DELIVERY_THRESHOLD ? 0 : DELIVERY_FEE;
            }

            const totalAmount = rentalAmount + deliveryFee;

            // Сохраняем аренду в localStorage
            const rental = {
                id: Date.now(),
                productName: currentProduct.name,
                productPrice: currentProduct.price,
                startDate: startDate,
                endDate: endDate,
                days: days,
                rentalAmount: rentalAmount,
                deliveryType: deliveryType,
                deliveryFee: deliveryFee,
                totalAmount: totalAmount,
                status: 'active',
                createdAt: new Date().toISOString(),
                expiresAt: new Date(endDate).getTime() + (24 * 60 * 60 * 1000)
            };

            saveRentalToHistory(rental);

            // Формируем сообщение для пользователя
            let message = `Аренда успешно оформлена!\n\n` +
                `Товар: ${currentProduct.name}\n` +
                `Период: ${days} ${getDaysWord(days)}\n` +
                `Стоимость аренды: ${rentalAmount} ₽\n`;

            if (deliveryType === 'courier') {
                if (deliveryFee === 0) {
                    message += `Доставка: бесплатно\n`;
                } else {
                    message += `Доставка: ${deliveryFee} ₽\n`;
                }
            }

            message += `Итоговая сумма: ${totalAmount} ₽`;

            alert(message);

            // Закрываем модальное окно
            const modal = bootstrap.Modal.getInstance(document.getElementById('rentalModal'));
            modal.hide();
        }

        function getDaysWord(days) {
            if (days % 10 === 1 && days % 100 !== 11) return 'день';
            if (days % 10 >= 2 && days % 10 <= 4 && (days % 100 < 10 || days % 100 >= 20)) return 'дня';
            return 'дней';
        }

        function saveRentalToHistory(rental) {
            let rentalHistory = JSON.parse(localStorage.getItem('rentalHistory') || '[]');
            rentalHistory.unshift(rental);

            // Ограничиваем историю последними 50 записями
            if (rentalHistory.length > 50) {
                rentalHistory = rentalHistory.slice(0, 50);
            }

            localStorage.setItem('rentalHistory', JSON.stringify(rentalHistory));
        }

        // Назначаем обработчики после загрузки DOM
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded');

            const startDateInput = document.getElementById('start-date');
            const endDateInput = document.getElementById('end-date');

            startDateInput.addEventListener('change', function() {
                // Когда выбираем дату начала, устанавливаем минимальную дату окончания
                if (this.value) {
                    const minEndDate = new Date(this.value);
                    minEndDate.setDate(minEndDate.getDate() + 1);
                    endDateInput.min = minEndDate.toISOString().split('T')[0];
                }
                updateTotal();
            });

            endDateInput.addEventListener('change', updateTotal);

            // Обработчики для радиокнопок доставки
            document.querySelectorAll('input[name="delivery"]').forEach(radio => {
                radio.addEventListener('change', updateTotal);
            });
        });
    </script>
@endsection
