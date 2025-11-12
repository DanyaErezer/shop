@extends('layouts.app')

@section('title', 'О нас - My Shop')

@section('styles')
    <link href="{{ asset('css/pages/about.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-5">
        <!-- Заголовок -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold text-dark mb-4">О НАС</h1>
                <p class="lead text-muted">Узнайте больше о нашем магазине и нашей философии</p>
            </div>
        </div>

        <!-- Основной контент -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Наша история</h2>
                <p class="mb-4">
                    My Shop был основан в 2024 году с целью предоставить нашим клиентам
                    лучшие товары по доступным ценам. Мы верим, что качество и стиль
                    должны быть доступны каждому.
                </p>
                <p class="mb-4">
                    Начиная с небольшого онлайн-магазина, мы выросли в надежного партнера
                    для тысяч покупателей по всей стране. Наша команда постоянно работает
                    над улучшением сервиса и расширением ассортимента.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <div class="about-image-placeholder bg-light rounded-3 p-5">
                    <i class="fas fa-store fa-5x text-primary mb-3"></i>
                    <p class="text-muted">Наш магазин</p>
                </div>
            </div>
        </div>

        <!-- Наши ценности -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-4">
                <h2 class="fw-bold">Наши ценности</h2>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-medal fa-3x text-warning"></i>
                        </div>
                        <h5 class="card-title">Качество</h5>
                        <p class="card-text text-muted">
                            Мы тщательно отбираем каждый товар, чтобы обеспечить
                            нашим клиентам только лучшее качество.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-hand-holding-usd fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title">Доступность</h5>
                        <p class="card-text text-muted">
                            Мы стремимся сделать модные и качественные товары
                            доступными для каждого покупателя.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-headset fa-3x text-info"></i>
                        </div>
                        <h5 class="card-title">Поддержка</h5>
                        <p class="card-text text-muted">
                            Наша служба поддержки всегда готова помочь вам
                            с любыми вопросами и решить проблемы.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Статистика -->
        <div class="row bg-dark text-white rounded-3 py-4 mb-5">
            <div class="col-md-3 text-center">
                <h3 class="fw-bold text-warning">1000+</h3>
                <p class="mb-0">Довольных клиентов</p>
            </div>
            <div class="col-md-3 text-center">
                <h3 class="fw-bold text-warning">500+</h3>
                <p class="mb-0">Товаров в ассортименте</p>
            </div>
            <div class="col-md-3 text-center">
                <h3 class="fw-bold text-warning">24/7</h3>
                <p class="mb-0">Поддержка клиентов</p>
            </div>
            <div class="col-md-3 text-center">
                <h3 class="fw-bold text-warning">30</h3>
                <p class="mb-0">Дней на возврат</p>
            </div>
        </div>

        <!-- Призыв к действию -->
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="fw-bold mb-3">Присоединяйтесь к нашей семье</h3>
                <p class="text-muted mb-4">
                    Станьте частью нашего сообщества и откройте для себя мир
                    качественных товаров и отличного сервиса.
                </p>
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-shopping-bag me-2"></i>Начать покупки
                </a>
            </div>
        </div>
    </div>
@endsection
