@extends('layouts.app')

@section('title', 'Управление товарами')

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
                            <a href="{{ route('admin.products') }}" class="nav-link active">Товары</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.rentals') }}" class="nav-link text-white">Аренды</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-lg-10">
                <div class="p-4">
                    <h2>Управление товарами</h2>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Форма добавления товара -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Добавить новый товар</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.products.create') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Название товара *</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Цена (руб/день) *</label>
                                            <input type="number" name="price" class="form-control" step="0.01" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Категория *</label>
                                            <select name="category" class="form-control" required>
                                                <option value="">Выберите категорию</option>
                                                @foreach($categories as $key => $name)
                                                    <option value="{{ $key }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Изображение (файл)</label>
                                            <input type="file" name="image" class="form-control">
                                            <small class="text-muted">Выберите файл изображения (JPG, PNG, GIF, WebP)</small>
                                            <form method="POST" action="{{ route('admin.products.create') }}" enctype="multipart/form-data">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Добавить товар</button>
                            </form>
                        </div>
                    </div>

                    <!-- Список товаров -->
                    <div class="card">
                        <div class="card-body">
                            @if($products->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Цена</th>
                                            <th>Категория</th>
                                            <th>Дата добавления</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ (int)$product->price }} ₽</td>
                                                <td>{{ $categories[$product->category] ?? $product->category }}</td>
                                                <td>{{ $product->created_at->format('d.m.Y H:i') }}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('admin.products.delete', $product) }}"
                                                          class="d-inline" onsubmit="return confirm('Удалить товар «{{ $product->name }}»?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $products->links() }}
                            @else
                                <div class="text-center py-5">
                                    <h5>Товаров пока нет</h5>
                                    <p class="text-muted">Добавьте первый товар с помощью формы выше</p>
                                </div>
                            @endif
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
