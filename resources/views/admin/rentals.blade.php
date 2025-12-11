@extends('layouts.app')

@section('title', 'Управление арендами')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 bg-dark text-white vh-100">
                <div class="p-3">
                    <h4>Админ панель</h4>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Дашборд</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link text-white">Пользователи</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.rentals') }}" class="nav-link active">Аренды</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-lg-10">
                <div class="p-4">
                    <h2>Управление арендами</h2>

                    <div class="card">
                        <div class="card-body">
                            <p class="text-muted">Функционал управления арендами в разработке</p>

                            <!-- Пример будущей таблицы -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Пользователь</th>
                                        <th>Инструмент</th>
                                        <th>Дата аренды</th>
                                        <th>Дата возврата</th>
                                        <th>Статус</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Нет данных об арендах</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
