@extends('layouts.app')

@section('title', 'Добавить товар')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-plus"></i> Добавить товар
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Название товара *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Описание</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Цена *</label>
                                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                               id="price" name="price" value="{{ old('price') }}" required>
                                        @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Количество на складе *</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                               id="stock" name="stock" value="{{ old('stock', 0) }}" required>
                                        @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Изображение</label>
                                <input type="text" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" value="{{ old('image') }}"
                                       placeholder="images/product/example.jpg">
                                <div class="form-text">
                                    Укажите путь к изображению. Например: <code>images/product/t-shirt.jpg</code>
                                </div>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                                    {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Товар активен</label>
                            </div>

                            <!-- Поле категории -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Категория</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror"
                                       id="category" name="category" value="{{ old('category') }}"
                                       placeholder="Мужская одежда, Женская одежда, Обувь и т.д.">
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле загрузки главного изображения -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Главное изображение</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле загрузки галереи -->
                            <div class="mb-3">
                                <label for="gallery" class="form-label">Галерея изображений</label>
                                <input type="file" class="form-control @error('gallery') is-invalid @enderror"
                                       id="gallery" name="gallery[]" multiple accept="image/*">
                                @error('gallery')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Поле характеристик -->
                            <div class="mb-3">
                                <label for="features" class="form-label">Характеристики (JSON)</label>
                                <textarea class="form-control @error('features') is-invalid @enderror"
                                          id="features" name="features" rows="3"
                                          placeholder='{"Цвет": "черный", "Размер": "M", "Материал": "хлопок 100%"}'>{{ old('features') }}</textarea>
                                @error('features')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Создать товар
                                </button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Отмена
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
