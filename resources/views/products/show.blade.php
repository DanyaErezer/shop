@extends('layouts.app')

@section('title', $product->name . ' - My Shop')

@section('styles')
    <link href="{{ asset('css/products/show.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <!-- Хлебные крошки -->
            <div class="col-12 mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                        @if($product->category)
                            <li class="breadcrumb-item"><a href="{{ route('products.category', $product->category) }}">{{ $product->category }}</a></li>
                        @endif
                        <li class="breadcrumb-item active">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Галерея изображений (левая часть) -->
            <div class="col-lg-6 mb-4">
                <div class="product-gallery">
                    <!-- Главное изображение -->
                    <div class="main-image mb-3">
                        <img src="/{{ $product->image }}" alt="{{ $product->name }}"
                             class="img-fluid rounded-3" id="mainImage">
                    </div>

                    <!-- Галерея превью -->
                    @if(!empty($product->gallery))
                        <div class="gallery-thumbs">
                            <div class="row g-2">
                                @foreach($product->gallery as $thumb)
                                    <div class="col-3">
                                        <img src="/{{ $thumb }}" alt="{{ $product->name }}"
                                             class="img-thumbnail gallery-thumb"
                                             data-image="/{{ $thumb }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Информация о товаре (правая часть) -->
            <div class="col-lg-6">
                <div class="product-info">
                    <h1 class="product-title mb-3">{{ $product->name }}</h1>

                    <div class="product-price mb-3">
                        <span class="h3 text-primary">{{ number_format($product->price, 2) }} руб.</span>
                    </div>

                    <div class="product-stock mb-4">
                        @if($product->stock > 0)
                            <span class="badge bg-success">В наличии ({{ $product->stock }} шт.)</span>
                        @else
                            <span class="badge bg-danger">Нет в наличии</span>
                        @endif
                    </div>

                    <div class="product-description mb-4">
                        <p>{{ $product->description }}</p>
                    </div>

                    <!-- Характеристики -->
                    @if(!empty($product->features))
                        <div class="product-features mb-4">
                            <h5>Характеристики:</h5>
                            <ul class="list-unstyled">
                                @foreach($product->features as $key => $value)
                                    <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Кнопки действий -->
                    <div class="product-actions">
                        @if($product->stock > 0)
                            <button class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-shopping-cart me-2"></i>В корзину
                            </button>
                        @endif
                        <button class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-heart me-2"></i>В избранное
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/products/show.js') }}"></script>
@endsection
