@extends('layouts.app')
@section('content')
    <section class="s-cabinet">
        <div class="container">
            <div class="title">
                Личный кабинет
            </div>
            <div class="wrapper">
                <div class="cabinet-info">
                    <div class="mentor-block-user-name">
                        <div class="base-info">
                            <div class="user-image">
                                <img src="{{ asset('images/user-icon.png') }}" alt="user-icon">
                            </div>
                            <div class="user-info">
                                <p class="name">
                                    Анастасия М, 27 лет
                                </p>
                                <p class="city">
                                    Москва, Россия / GMT+03
                                </p>
                                <p class="work">
                                    Рекрутер
                                </p>
                            </div>
                        </div>

                        <div class="status-price-block">
                            Статус
                            <div class="mentor">
                                Наставник
                                <br>
                                <div class="status">
                                    Свободен
                                </div>
                            </div>
                            <div class="price">
                                3000 ₽ / час
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="mentor-statistics">
                        <div class="mentor-statistic-item">
                            <div class="count">10</div>
                            <p>положительных отзывов</p>

                        </div>
                        <div class="mentor-statistic-item">
                            <div class="count">8</div>
                            <p>Открыл контактов</p>

                        </div>
                        <div class="mentor-statistic-item">
                            <div class="count">2</div>
                            <p>Просмотров за неделю</p>
                        </div>
                    </div>
                </div>
                @include('client.components.cabinetSidebar')
            </div>
            <div class="profile-menu-items">
                <div class="profile-menu-items__menu-item ">
                    <div class="title">О себе</div>
                    <a href="">Перейти</a>
                    <div class="profile-menu-items__menu-item-counter">
                        <p>
                            Заполнено
                        </p>
                        <div class="mini-profile-progressbar">
                            <div class="profile-progressbar">
                                <div class="middle-circle"></div>
                                <div class="progress-spinner"></div>
                            </div>
                            <p class="progress-percent">35%</p>
                        </div>
                    </div>
                </div>
                <div class="profile-menu-items__menu-item bg-profile-card-spec">
                    <div class="title">Специализация</div>
                    <a href="">Перейти</a>
                    <div class="profile-menu-items__menu-item-counter">
                        <p>
                            Заполнено
                        </p>
                        <div class="mini-profile-progressbar">

                            <div class="profile-progressbar">
                                <div class="middle-circle"></div>
                                <div class="progress-spinner"></div>
                            </div>
                            <p class="progress-percent">0%</p>
                        </div>
                    </div>
                </div>
                <div class="profile-menu-items__menu-item bg-profile-card-certificate">
                    <div class="title">Сертификаты, курсы</div>
                    <a href="">Перейти</a>
                    <div class="profile-menu-items__menu-item-counter">
                        <p>
                            Заполнено
                        </p>
                        <div class="mini-profile-progressbar">
                            <div class="profile-progressbar">
                                <div class="middle-circle"></div>
                                <div class="progress-spinner"></div>
                            </div>
                            <p class="progress-percent">35%</p>
                        </div>
                    </div>
                </div>
                <div class="profile-menu-items__menu-item bg-profile-card-megaphone">
                    <div class="title">Отзывы</div>
                    <a href="">Перейти</a>
                </div>
                <div class="profile-menu-items__menu-item bg-profile-card-calendar">
                    <div class="title">Наставничество</div>
                    <a href="">Перейти</a>

                </div>
            </div>
            {{--            <div class="containers">--}}
            {{--                <div class=item></div>--}}
            {{--                <div class=item></div>--}}
            {{--                <div class=item></div>--}}
            {{--                <div class=item></div>--}}
            {{--                <div class=item></div>--}}
            {{--            </div>--}}
            {{--            <style>--}}
            {{--                .containers {--}}
            {{--                    display: flex;--}}
            {{--                    flex-flow: row wrap;--}}
            {{--                    justify-content: flex-start;--}}
            {{--                }--}}

            {{--                .item {--}}
            {{--                    background-color: gray;--}}
            {{--                    width: 100px;--}}
            {{--                    height: 100px;--}}
            {{--                    flex: 0 0 32%;--}}
            {{--                    margin: 1% 0;--}}
            {{--                }--}}

            {{--                .item:nth-child(3n-1) {--}}
            {{--                     margin-left: 2%;--}}
            {{--                     margin-right: 2%;--}}
            {{--                 }--}}
            {{--            </style>--}}
        </div>
    </section>
    @include('client.components.sectionWriteToUs', ['gray' => true])
@endsection
