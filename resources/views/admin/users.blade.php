@extends('layouts.app')

@section('title', 'Управление пользователями')

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
                            <a href="{{ route('admin.users') }}" class="nav-link active">Пользователи</a>
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

            <div class="col-md-9 col-lg-10">
                <div class="p-4">
                    <h2>Управление пользователями</h2>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Дата регистрации</th>
                                        <th>Статус</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                                            <td>
                                                @if($user->is_admin)
                                                    <span class="badge bg-success">Админ</span>
                                                @else
                                                    <span class="badge bg-secondary">Пользователь</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <form method="POST" action="{{ route('admin.toggle.admin', $user) }}" class="d-inline">
                                                        @csrf
                                                        @if($user->is_admin)
                                                            <button type="submit" class="btn btn-warning btn-sm">Убрать админа</button>
                                                        @else
                                                            <button type="submit" class="btn btn-success btn-sm">Сделать админом</button>
                                                        @endif
                                                    </form>

                                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="d-inline"
                                                          onsubmit="return confirm('Удалить пользователя {{ $user->name }}?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $users->links() }}
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
        .d-flex.gap-2 {
            gap: 8px;
        }
    </style>
@endsection
