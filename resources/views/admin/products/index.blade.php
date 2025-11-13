@extends('layouts.app')

@section('title', 'Управление товарами')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            <i class="fas fa-boxes"></i> Управление товарами
        </h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Добавить товар
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                    <tr>
                        <th>Изображение</th>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Остаток</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="/{{ $product->image }}" alt="{{ $product->name }}"
                                         style="width: 50px; height: 50px; object-fit: cover;" class="img-thumbnail">
                                @else
                                    <div class="text-muted" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2) }} руб.</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                @if($product->is_active)
                                    <span class="badge bg-success">Активен</span>
                                @else
                                    <span class="badge bg-secondary">Неактивен</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="btn btn-warning" title="Редактировать">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('products.show', $product->slug) }}"
                                       class="btn btn-info" title="Просмотр" target="_blank">
                                        <i class="fas fa-eye"></i> <!-- Правильная иконка -->
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Удалить товар?')"
                                                title="Удалить">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="fas fa-box-open fa-2x mb-3"></i>
                                <p>Товары не найдены</p>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                    Добавить первый товар
                                </a>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
