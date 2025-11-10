@extends('layouts.app')

@section('title', 'Главная - My Shop')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="jumbotron bg-light p-5 rounded">
                <h1 class="display-4">Добро пожаловать в My Shop!</h1>
                <p class="lead">Это ваш будущий интернет-магазин. Начните добавлять товары через админ-панель.</p>
                <hr class="my-4">

                @auth
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-boxes fa-3x text-primary mb-3"></i>
                                    <h5>Товары</h5>
                                    <p>Управление каталогом товаров</p>
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
                                        Перейти в админку
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-cog fa-3x text-success mb-3"></i>
                                    <h5>Настройки</h5>
                                    <p>Настройте ваш магазин</p>
                                    <a href="#" class="btn btn-success">Настроить</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-chart-bar fa-3x text-info mb-3"></i>
                                    <h5>Статистика</h5>
                                    <p>Просмотр статистики</p>
                                    <a href="#" class="btn btn-info">Смотреть</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Для управления магазином необходимо войти в систему.</p>
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">
                        <i class="fas fa-sign-in-alt"></i> Войти в систему
                    </a>
                @endauth
            </div>
        </div>
    </div>
@endsection
