@extends('layouts.app')

@section('title', 'My Shop - Интернет-магазин')

@section('content')
    <div class="container-fluid px-0">
        <!-- Hero Section -->
        <div class="bg-dark text-white py-5 text-center">
            <div class="container">
                <h1 class="display-4 fw-bold">MY SHOP</h1>
                <p class="lead">Лучшие товары для вас</p>
            </div>
        </div>

        <!-- Gender Selection -->
        <div class="row g-0">
            <!-- Мужская категория -->
            <div class="col-md-6 position-relative">
                <div class="gender-section" style="height: 80vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/images/home/men-collection.jpg') center/cover;">
                    <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white">
                        <h2 class="display-3 fw-bold mb-4 text-gold">МУЖЧИНАМ</h2>
                        <p class="fs-5 mb-4">Стильная одежда и аксессуары</p>
                        <a href="#" class="btn btn-gold-outline btn-lg px-5 py-3 gold-hover">
                            СМОТРЕТЬ КОЛЛЕКЦИЮ <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Женская категория -->
            <div class="col-md-6 position-relative">
                <div class="gender-section" style="height: 80vh; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/images/home/women-collection.jpg') center/cover;">
                    <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white">
                        <h2 class="display-3 fw-bold mb-4 text-gold">ЖЕНЩИНАМ</h2>
                        <p class="fs-5 mb-4">Элегантность и утонченность</p>
                        <a href="#" class="btn btn-gold-outline btn-lg px-5 py-3 gold-hover">
                            СМОТРЕТЬ КОЛЛЕКЦИЮ <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-shipping-fast fa-3x text-primary"></i>
                        </div>
                        <h4>Бесплатная доставка</h4>
                        <p class="text-muted">При заказе от 5000 рублей</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-undo-alt fa-3x text-primary"></i>
                        </div>
                        <h4>Возврат товара</h4>
                        <p class="text-muted">В течение 30 дней</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-headset fa-3x text-primary"></i>
                        </div>
                        <h4>Поддержка 24/7</h4>
                        <p class="text-muted">Всегда на связи</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .gender-section {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .gender-section:hover {
            transform: scale(1.02);
        }

        .gender-section:hover .btn {
            background-color: gold;
        }
    </style>
@endsection
