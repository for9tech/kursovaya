@extends('layouts.app')

@section('title', 'Админ панель')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 bg-dark text-white vh-100">
                <div class="p-3">
                    <h4>Админ панель</h4>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link active">Дашборд</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link text-white">Пользователи</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products') }}" class="nav-link text-white">Товары</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.rentals') }}" class="nav-link text-white">Аренды</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-9 col-lg-10">
                <div class="p-4">
                    <h2>Дашборд</h2>

                    <!-- Статистика -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5>{{ $stats['users_count'] }}</h5>
                                    <p>Всего пользователей</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5>{{ $stats['admins_count'] }}</h5>
                                    <p>Администраторов</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5>{{ $stats['products_count'] ?? 0 }}</h5>
                                    <p>Товаров</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5>{{ $stats['users_count'] - $stats['admins_count'] }}</h5>
                                    <p>Обычных пользователей</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Последние пользователи -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Последние пользователи</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Дата регистрации</th>
                                        <th>Админ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recent_users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->format('d.m.Y') }}</td>
                                            <td>
                                                @if($user->is_admin)
                                                    <span class="badge bg-success">Да</span>
                                                @else
                                                    <span class="badge bg-secondary">Нет</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Последние товары -->
                    @if(isset($recent_products) && $recent_products->count() > 0)
                        <div class="card">
                            <div class="card-header">
                                <h5>Последние товары</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Цена</th>
                                            <th>Категория</th>
                                            <th>Дата добавления</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recent_products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ intval($product->price) }} ₽</td>
                                                <td>
                                                    @php
                                                        $categories = [
                                                            'garden' => 'Сад',
                                                            'measuring' => 'Измерит.',
                                                            'workwear' => 'Спецодежда',
                                                            'welders' => 'Сварка',
                                                            'generators' => 'Генераторы',
                                                            'grinders' => 'Болгарки',
                                                            'perforators' => 'Перфораторы',
                                                            'saws' => 'Пилы'
                                                        ];
                                                    @endphp
                                                    {{ $categories[$product->category] ?? $product->category }}
                                                </td>
                                                <td>{{ $product->created_at->format('d.m.Y') }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <style>
        .nav-link.active {
            background-color: #E6A645 !important;
            border-color: #E6A645 !important;
        }
    </style>
@endsection
