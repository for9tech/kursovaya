@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <!-- Блок с данными пользователя -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Ваши данные</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Имя:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Зарегистрирован:</strong> {{ $user->created_at->format('d.m.Y') }}</p>

                        <div class="mt-3">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">Редактировать данные</a>
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#passwordModal">
                                Сменить пароль
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- История аренд -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">История аренды</h5>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="clearRentalHistory()">
                            Очистить историю
                        </button>
                    </div>
                    <div class="card-body" id="rentalHistoryContainer">
                        <p class="text-muted" id="noRentalsText">У вас еще нет аренд</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно смены пароля -->
    <div class="modal fade" id="passwordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Смена пароля</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('profile.password.change') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Текущий пароль</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                   id="current_password" name="current_password" required>
                            @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Новый пароль</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                   id="new_password" name="new_password" required>
                            @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Подтвердите новый пароль</label>
                            <input type="password" class="form-control"
                                   id="new_password_confirmation" name="new_password_confirmation" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сменить пароль</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function clearRentalHistory() {
            if(confirm('Вы уверены что хотите очистить всю историю аренд? Это действие нельзя отменить.')) {
                localStorage.removeItem('rentalHistory');
                alert('История аренд очищена');
                location.reload();
            }
        }

        function loadRentalHistory() {
            const rentalHistory = JSON.parse(localStorage.getItem('rentalHistory') || '[]');
            const rentalHistoryContainer = document.getElementById('rentalHistoryContainer');
            const noRentalsText = document.getElementById('noRentalsText');

            if (rentalHistory.length > 0) {
                noRentalsText.style.display = 'none';

                rentalHistoryContainer.innerHTML = `
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Инструмент</th>
                                <th>Дата получения</th>
                                <th>Дата возврата</th>
                                <th>Стоимость</th>
                                <th>Статус</th>
                            </tr>
                            </thead>
                            <tbody id="rentalHistoryBody">
                            </tbody>
                        </table>
                    </div>
                `;

                const rentalHistoryBody = document.getElementById('rentalHistoryBody');
                rentalHistory.forEach(rental => {
                    const row = document.createElement('tr');
                    const status = getRentalStatus(rental);
                    const statusClass = status === 'Активна' ? 'bg-success' : 'bg-secondary';

                    row.innerHTML = `
                        <td>${rental.productName}</td>
                        <td>${formatDate(rental.startDate)}</td>
                        <td>${formatDate(rental.endDate)}</td>
                        <td>${rental.totalAmount} ₽</td>
                        <td><span class="badge ${statusClass}">${status}</span></td>
                    `;
                    rentalHistoryBody.appendChild(row);
                });
            } else {
                noRentalsText.style.display = 'block';
                rentalHistoryContainer.innerHTML = '<p class="text-muted" id="noRentalsText">У вас еще нет аренд</p>';
            }
        }

        function getRentalStatus(rental) {
            const now = Date.now();
            const endDate = new Date(rental.endDate).getTime();

            if (rental.expiresAt && rental.expiresAt <= now) {
                return 'Завершена';
            } else if (endDate < now) {
                return 'Завершена';
            } else {
                return 'Активна';
            }
        }

        function formatDate(dateString) {
            return new Date(dateString).toLocaleDateString('ru-RU');
        }

        // Загружаем историю при загрузке страницы
        document.addEventListener('DOMContentLoaded', function() {
            loadRentalHistory();
        });
    </script>
@endsection
