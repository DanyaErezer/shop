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
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
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

                            <div class="mb-3">
                                <label for="category" class="form-label">Категория</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror"
                                       id="category" name="category" value="{{ old('category') }}"
                                       placeholder="Мужская одежда, Женская одежда, Обувь и т.д.">
                                @error('category')
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

                            <!-- Главное изображение -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Главное изображение *</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*" required>
                                <div class="form-text">
                                    Основное фото товара. Разрешенные форматы: JPG, PNG, GIF, WEBP. Макс. размер: 2MB
                                </div>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Галерея изображений -->
                            <div class="mb-3">
                                <label for="gallery" class="form-label">Дополнительные изображения</label>
                                <input type="file" class="form-control @error('gallery.*') is-invalid @enderror"
                                       id="gallery" name="gallery[]" multiple accept="image/*">
                                <div class="form-text">
                                    Дополнительные фото товара (максимум 5). Можно выбрать несколько файлов.
                                </div>
                                @error('gallery.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Характеристики -->
                            <div class="mb-3">
                                <label for="features" class="form-label">Характеристики</label>
                                <textarea class="form-control @error('features') is-invalid @enderror"
                                          id="features" name="features" rows="3"
                                          placeholder='{"Цвет": "черный", "Размер": "M", "Материал": "хлопок 100%"}'>{{ old('features') }}</textarea>
                                <div class="form-text">
                                    Введите характеристики в JSON формате: ключ и значение
                                </div>
                                @error('features')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                                    {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Товар активен</label>
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

    <!-- Preview Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Предпросмотр главного изображения
            const mainImageInput = document.getElementById('image');
            const mainImagePreview = document.createElement('div');
            mainImagePreview.className = 'mt-2';
            mainImageInput.parentNode.appendChild(mainImagePreview);

            mainImageInput.addEventListener('change', function(e) {
                mainImagePreview.innerHTML = '';
                if (e.target.files[0]) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(e.target.files[0]);
                    img.style.maxWidth = '200px';
                    img.style.maxHeight = '200px';
                    img.className = 'img-thumbnail';
                    mainImagePreview.appendChild(img);
                }
            });

            // Предпросмотр галереи
            const galleryInput = document.getElementById('gallery');
            const galleryPreview = document.createElement('div');
            galleryPreview.className = 'mt-2';
            galleryInput.parentNode.appendChild(galleryPreview);

            galleryInput.addEventListener('change', function(e) {
                galleryPreview.innerHTML = '<small>Выбрано файлов: ' + e.target.files.length + '</small>';

                Array.from(e.target.files).forEach(file => {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.style.maxWidth = '100px';
                    img.style.maxHeight = '100px';
                    img.className = 'img-thumbnail me-2 mb-2';
                    galleryPreview.appendChild(img);
                });
            });
        });
    </script>
@endsection
