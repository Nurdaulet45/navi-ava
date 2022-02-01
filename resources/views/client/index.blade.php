@extends('layouts/app')
@section('content')
    <section class="s-start-growing">
        <div class="container">
            <h2>Найди наставника - начни расти</h2>
            <div class="buttons">
                <button class="btn-white-blue large-btn">Найти наставника</button>
                <button class=" btn-default medium-btn">Найти ученика-менти</button>
                <button class="btn-default medium-btn">Найти консультанта</button>
            </div>
        </div>
    </section>
    <section class="s-info">
        <div class="container">
            <div class="info">
                <div class="logo">
                    <img src="{{ asset('images/logo-footer.svg') }}" width="493" height="64"
                         alt="{{ env('APP_NAME') }}">
                </div>
                <p>
                    NAVI-AVA - это платформа для для развития и роста, поиска специалистов своего дела. Вы можете
                    делиться знаниями, стать Наставниками или найти Наставников, Консультантов. 98% успешных людей имели
                    Наставников. Мы собираем Наставников, Консультантов любой профессии, специальности, должности из
                    любой сферы и отрасли.
                </p>
            </div>
        </div>
    </section>
    <section class="s-famous-people-info">
        <div class="container">
            <h3 class="title">98% успешных людей имели наставника</h3>
            <div class="famous-people">
                <div class="famous-people-card">
                    <img src="{{ asset('images/child-mentor.png') }}" width="420" height="377" alt="Mentor">
                    <div class="info">
                        <p class="name">Стив Джобс</p>
                        Наставник это лучший инструмент для тех, кто хочет добиться большего. Он покажет вам кратчайший
                        путь для достижения ваших целей, поделится своим опытом и своими ошибками.
                    </div>
                </div>
                <div class="famous-people-card">
                    <img src="{{ asset('images/child-mentor2.png') }}" width="420" height="377" alt="Mentor">
                    <div class="info">
                        <p class="name">Марк Цекерберг</p>
                        <div class="small-text">
                            Марк Цукерберг. ниже текст: Сейчас настало время тотального обмена информацией между
                            конкретными людьми. Человек не может усовершенствоваться, если не помогает
                            усовершенствоваться другим.
                        </div>
                    </div>

                </div>
                <div class="famous-people-card">
                    <img src="{{ asset('images/child-mentor3.png') }}" width="420" height="377" alt="Mentor">
                    <div class="info">
                        <p class="name">Илон Маск</p>
                        Илон Маск. ниже текст: Первый шаг- определить , что это возможно, сама возможность обязательно
                        появится, даже если все шансы против вас , вы все равно должны это делать.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="s-mentors">
        <div class="container">
            <div class="head">
                <h3 class="title">Наши наставники</h3>
                <div class="default-tabs">
                    <div class="default-tabs__default-tab default-tabs__active">
                        Наставники-консультанты
                    </div>
                    <div class="default-tabs__default-tab">
                        Платные наставники
                    </div>
                </div>
            </div>
            <div class="default-mentor-cards">
                <div class="default-mentor-card">
                    <img src="{{ asset('images/mentor.png') }}" width="360" height="239" alt="">
                    <div class="info">
                        <div class="name">
                            Вадим Ч
                        </div>
                        <div class="work">
                            Разработчик — Яндекса
                        </div>
                        <div class="rate">
                            <div class="stars">

                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#C5C4C3"/>
                                </svg>
                            </div>
                            <p>
                                Все отзывы (34)
                            </p>
                        </div>
                        <button class="btn-white-green small-btn">
                            Подобнее
                        </button>
                    </div>
                </div>
                <div class="default-mentor-card">
                    <img src="{{ asset('images/mentor.png') }}" width="360" height="239" alt="">
                    <div class="info">
                        <div class="name">
                            Вадим Ч
                        </div>
                        <div class="work">
                            Разработчик — Яндекса
                        </div>
                        <div class="rate">
                            <div class="stars">

                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#C5C4C3"/>
                                </svg>
                            </div>
                            <p>
                                Все отзывы (34)
                            </p>
                        </div>
                        <button class="btn-white-green small-btn">
                            Подобнее
                        </button>
                    </div>
                </div>

                <div class="default-mentor-card">
                    <img src="{{ asset('images/mentor.png') }}" width="360" height="239" alt="">
                    <div class="info">
                        <div class="name">
                            Вадим Ч
                        </div>
                        <div class="work">
                            Разработчик — Яндекса
                        </div>
                        <div class="rate">
                            <div class="stars">

                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#C5C4C3"/>
                                </svg>
                            </div>
                            <p>
                                Все отзывы (34)
                            </p>
                        </div>
                        <button class="btn-white-green small-btn">
                            Подобнее
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section class="s-consultants">
        <div class="container">
            <h3 class="title">Консультанты</h3>
            <div class="default-mentor-cards">
                <div class="default-mentor-card">
                    <img src="{{ asset('images/mentor.png') }}" width="360" height="239" alt="">
                    <div class="info">
                        <div class="name">
                            Вадим Ч
                        </div>
                        <div class="work">
                            Разработчик — Яндекса
                        </div>
                        <div class="rate">
                            <div class="stars">

                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#C5C4C3"/>
                                </svg>
                            </div>
                            <p>
                                Все отзывы (34)
                            </p>
                        </div>
                        <button class="btn-white-green small-btn">
                            Подобнее
                        </button>
                    </div>
                </div>
                <div class="default-mentor-card">
                    <img src="{{ asset('images/mentor.png') }}" width="360" height="239" alt="">
                    <div class="info">
                        <div class="name">
                            Вадим Ч
                        </div>
                        <div class="work">
                            Разработчик — Яндекса
                        </div>
                        <div class="rate">
                            <div class="stars">

                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#C5C4C3"/>
                                </svg>
                            </div>
                            <p>
                                Все отзывы (34)
                            </p>
                        </div>
                        <button class="btn-white-green small-btn">
                            Подобнее
                        </button>
                    </div>
                </div>

                <div class="default-mentor-card">
                    <img src="{{ asset('images/mentor.png') }}" width="360" height="239" alt="">
                    <div class="info">
                        <div class="name">
                            Вадим Ч
                        </div>
                        <div class="work">
                            Разработчик — Яндекса
                        </div>
                        <div class="rate">
                            <div class="stars">

                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#E0C11A"/>
                                </svg>
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0L9.79611 5.52786H15.6085L10.9062 8.94427L12.7023 14.4721L8 11.0557L3.29772 14.4721L5.09383 8.94427L0.391548 5.52786H6.20389L8 0Z"
                                        fill="#C5C4C3"/>
                                </svg>
                            </div>
                            <p>
                                Все отзывы (34)
                            </p>
                        </div>
                        <button class="btn-white-green small-btn">
                            Подобнее
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="s-does-work">
        <div class="container">
            <div class="title">
                Как же это работает?
            </div>
            <div class="default-tabs">
                <div class="default-tabs__default-tab default-tabs__active">
                    Наставникам
                </div>
                <div class="default-tabs__default-tab">
                    Ученикам-менти
                </div>
                <div class="default-tabs__default-tab">
                    Консультантам
                </div>
            </div>
            <div class="work-steps">
                <div class="step-item step-1">
                    <img src="{{ asset('images/step-1.svg') }}" width="150" height="150" alt="Step">
                    <p>Выберите наставника</p>
                </div>
                <div class="rb-arrow">
                    <img src="{{ asset('images/step-rb-arrow.svg') }}" width="212" height="87" alt="Arrow">
                </div>
                <div class="step-item step-2">
                    <img src="{{ asset('images/step-2.svg') }}" width="150" height="150" alt="Step">
                    <p>Спишитесь, познакомьтесь с учеником</p>
                </div>
                <div class="rt-arrow">
                    <img src="{{ asset('images/step-rt-arrow.svg') }}" width="213" height="85" alt="Arrow">

                </div>
                <div class="step-item step-3">
                    <img src="{{ asset('images/step-3.svg') }}" width="150" height="150" alt="Step">
                    <p>Консультируйтесь, общайтесь, развивайтесь</p>
                </div>
            </div>
            <div class="buttons">
                <button class="btn-default medium-large-btn">
                    О сервисе
                </button>
                <button class="btn-default medium-large-btn">
                    Зарегистрироваться
                </button>
            </div>
        </div>
    </section>
    <section class="s-start">
        <div class="container">
            <div class="title">
                Давайте начнем
            </div>
            <div class="become-info-items">
                <div class="become-info-item become-info-item-mentor">
                    <div class="info">
                        <div class="title">
                            <h4>Стать наставником</h4>
                            <button class="btn-default-shadow">
                                <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.19535 0.528604C6.45568 0.268257 6.87781 0.268257 7.13815 0.528604L11.1381 4.52861C11.2631 4.65361 11.3334 4.82321 11.3334 5.00001C11.3334 5.17681 11.2631 5.34641 11.1381 5.47141L7.13815 9.47141C6.87781 9.73174 6.45568 9.73174 6.19535 9.47141C5.93501 9.21108 5.93501 8.78894 6.19535 8.52861L9.05728 5.66668H1.33341C0.965228 5.66668 0.666748 5.36821 0.666748 5.00001C0.666748 4.63181 0.965228 4.33334 1.33341 4.33334H9.05728L6.19535 1.47142C5.93501 1.21106 5.93501 0.788957 6.19535 0.528604Z"
                                        fill="white"/>
                                </svg>
                            </button>
                        </div>
                        <ul>
                            <li>Повторение - мать учения. Обучая других людей, прокачиваешься сам.</li>
                            <li>Прекрасная возможность попробовать себя в роли наставника.</li>
                            <li>Твой выбор, который делает жизнь других лучше.</li>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/start-mentor.png') }}" alt="start-mentor">
                    </div>
                </div>
                <div class="become-info-item become-info-item-child">
                    <div class="image">
                        <img src="{{ asset('images/start-child.png') }}" alt="start-mentor">
                    </div>
                    <div class="info">
                        <div class="title">
                            <h4>Стать учеником-менти</h4>
                            <button class="btn-default-shadow">
                                <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.19535 0.528604C6.45568 0.268257 6.87781 0.268257 7.13815 0.528604L11.1381 4.52861C11.2631 4.65361 11.3334 4.82321 11.3334 5.00001C11.3334 5.17681 11.2631 5.34641 11.1381 5.47141L7.13815 9.47141C6.87781 9.73174 6.45568 9.73174 6.19535 9.47141C5.93501 9.21108 5.93501 8.78894 6.19535 8.52861L9.05728 5.66668H1.33341C0.965228 5.66668 0.666748 5.36821 0.666748 5.00001C0.666748 4.63181 0.965228 4.33334 1.33341 4.33334H9.05728L6.19535 1.47142C5.93501 1.21106 5.93501 0.788957 6.19535 0.528604Z"
                                        fill="white"/>
                                </svg>
                            </button>
                        </div>
                        <ul>
                            <li>Повторение - мать учения. Обучая других людей, прокачиваешься сам.</li>
                            <li>Прекрасная возможность попробовать себя в роли наставника.</li>
                            <li>Твой выбор, который делает жизнь других лучше.</li>
                        </ul>
                    </div>
                </div>

                <div class="become-info-item become-info-item-consultant">
                    <div class="info">
                        <div class="title">
                            <h4>Стать консультантом</h4>
                            <button class="btn-default-shadow">
                                <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.19535 0.528604C6.45568 0.268257 6.87781 0.268257 7.13815 0.528604L11.1381 4.52861C11.2631 4.65361 11.3334 4.82321 11.3334 5.00001C11.3334 5.17681 11.2631 5.34641 11.1381 5.47141L7.13815 9.47141C6.87781 9.73174 6.45568 9.73174 6.19535 9.47141C5.93501 9.21108 5.93501 8.78894 6.19535 8.52861L9.05728 5.66668H1.33341C0.965228 5.66668 0.666748 5.36821 0.666748 5.00001C0.666748 4.63181 0.965228 4.33334 1.33341 4.33334H9.05728L6.19535 1.47142C5.93501 1.21106 5.93501 0.788957 6.19535 0.528604Z"
                                        fill="white"/>
                                </svg>
                            </button>
                        </div>
                        <ul>
                            <li>Повторение - мать учения. Обучая других людей, прокачиваешься сам.</li>
                            <li>Прекрасная возможность попробовать себя в роли наставника.</li>
                            <li>Твой выбор, который делает жизнь других лучше.</li>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/start-consult.png') }}" alt="start-mentor">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="s-spec">
        <div class="container">
            <div class="title">
                Выберите специализацию, чтобы найти своего наставника-консультанта
            </div>
            <div class="spec-group-items">
                <div class="spec-group-item">
                    <img src="{{ asset('images/scep-group-edu.png') }}" alt="spec-group-edu">
                    <p>Образование</p>
                </div>
                <div class="spec-group-item">
                    <img src="{{ asset('images/spec-group-dev.png') }}" alt="spec-group-dev">
                    <p>Разработка и IT</p>
                </div>
                <div class="spec-group-item">
                    <img src="{{ asset('images/spec-group-science.png') }}" alt="spec-group-dev">
                    <p>Наука &nbsp;</p>
                </div>
                <div class="spec-group-item">
                    <img src="{{ asset('images/spec-group-bus.png') }}" alt="spec-group-dev">
                    {{--                    <p>Наука</p>--}}
                    <p>Бизнес и предпринимательство</p>
                </div>
            </div>
            <div class="spec-group-items-spec">

                <div class="spec-items">
                    <div class="spec-item btn-white-green">
                        Экономика
                    </div>

                    <div class="spec-item btn-white-green">
                        Искусство и культура
                    </div>
                    <div class="spec-item btn-white-green">
                        Менеджмент и управление
                    </div>
                    <div class="spec-item btn-white-green">
                        Другое
                    </div>
                </div>
                <div class="spec-items">
                    <div class="spec-item btn-white-green">
                        Психология
                    </div>
                    <div class="spec-item btn-white-green">
                        СМИ и издательство
                    </div>
                    <div class="spec-item btn-white-green">
                        Торговая отрасль
                    </div>
                    <div class="spec-item btn-white-green">
                        Сельское хозяйство
                    </div>

                </div>
                <div class="spec-items">


                    <div class="spec-item btn-white-green">
                        Маркетинг, реклама и PR
                    </div>
                    <div class="spec-item btn-white-green">
                        Спорт
                    </div>
                    <div class="spec-item btn-white-green">
                        Строительство
                    </div>
                    <div class="spec-item btn-white-green">
                        Искусство и культура
                    </div>

                </div>
                <div class="spec-items">

                    <div class="spec-item btn-white-green">
                        Спорт
                    </div>
                    <div class="spec-item btn-white-green">
                        Строительство
                    </div>
                    <div class="spec-item btn-white-green">
                        Искусство и культура
                    </div>
                    <div class="spec-item btn-white-green">
                        Менеджмент и управление
                    </div>
                    <div class="spec-item btn-white-green">
                        Другое
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="s-reviews">
        <div class="container">
            <div class="title">Отзывы учеников</div>
            <div class="review-items">
                <div class="review-card">
                    <div class="review-card-header">
                        <img src="{{ asset('images/user-icon.png') }}" alt="user icon">
                        <div class="name">Вадим М</div>
                    </div>
                    <div class="line"></div>
                    <div class="review-card-body">
                        <div class="text">
                            Очень понравился наставник. Был в восторге как легко и просто можно разобрать даже самые сложные
                            задания. Буду и в дальнейшем обращаться за помощью
                        </div>
                        <a href="">
                            Читать отзыв целиком
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-header">
                        <img src="{{ asset('images/user-icon.png') }}" alt="user icon">
                        <div class="name">Вадим М</div>
                    </div>
                    <div class="line"></div>
                    <div class="review-card-body">
                        <div class="text">
                            Очень понравился наставник. Был в восторге как легко и просто можно разобрать даже самые сложные
                            задания. Буду и в дальнейшем обращаться за помощью
                        </div>
                        <a href="">
                            Читать отзыв целиком
                        </a>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-header">
                        <img src="{{ asset('images/user-icon.png') }}" alt="user icon">
                        <div class="name">Вадим М</div>
                    </div>
                    <div class="line"></div>
                    <div class="review-card-body">
                        <div class="text">
                            Очень понравился наставник. Был в восторге как легко и просто можно разобрать даже самые сложные
                            задания. Буду и в дальнейшем обращаться за помощью
                        </div>
                        <a href="">
                            Читать отзыв целиком
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="s-blog">
        <div class="container">
            <div class="head">
                <div class="title">
                    Блог
                </div>
                <button class="btn-white-green small-btn">
                    Читать еще <svg width="16" style="margin-left: 12px;" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.2929 0.79289C8.6834 0.40237 9.3166 0.40237 9.7071 0.79289L15.7071 6.7929C15.8946 6.9804 16 7.2348 16 7.5C16 7.7652 15.8946 8.0196 15.7071 8.2071L9.7071 14.2071C9.3166 14.5976 8.6834 14.5976 8.2929 14.2071C7.9024 13.8166 7.9024 13.1834 8.2929 12.7929L12.5858 8.5H1C0.44772 8.5 0 8.0523 0 7.5C0 6.9477 0.44772 6.5 1 6.5H12.5858L8.2929 2.20711C7.9024 1.81658 7.9024 1.18342 8.2929 0.79289Z" fill="#05BCB9"/>
                    </svg>

                </button>
            </div>

            <div class="post-items">
                <div class="post-item">
                    <img src="{{ asset('images/blog.png') }}" width="418" height="205" alt="blog">
                    <div class="title">
                        Изменения в правилах оформление заявки для учеников на наставничество
                    </div>
                    <p class="text">
                        С 1 августа произойдуи изменения в оформление заявок. Прошу всех ознакомиться и не нарушать правила сервиса ни в коем случае.
                    </p>
                    <a href="">
                        ПОдробнее
                    </a>
                </div>
                <div class="post-item">
                    <img src="{{ asset('images/blog.png') }}" width="418" height="205" alt="blog">
                    <div class="title">
                        Изменения в правилах оформление заявки для учеников на наставничество
                    </div>
                    <p class="text">
                        С 1 августа произойдуи изменения в оформление заявок. Прошу всех ознакомиться и не нарушать правила сервиса ни в коем случае.
                    </p>
                    <a href="">
                        ПОдробнее
                    </a>
                </div>
                <div class="post-item">
                    <img src="{{ asset('images/blog.png') }}" width="418" height="205" alt="blog">
                    <div class="title">
                        Изменения в правилах оформление заявки для учеников на наставничество
                    </div>
                    <p class="text">
                        С 1 августа произойдуи изменения в оформление заявок. Прошу всех ознакомиться и не нарушать правила сервиса ни в коем случае.
                    </p>
                    <a href="">
                        ПОдробнее
                    </a>
                </div>
            </div>

        </div>
    </section>
    <section class="s-question-answers">
        <div class="container">
            <div class="title">
                Вопрос-ответ
            </div>
            <div class="d-flex justify-content-center">
                <div class="question-answers">
                    <div class="accordion-block">
                        <div class="accordion">
                            Для чего нужна платформа NAVI-AVA?

                            <div class="svg-block">
                                <svg class="icon arrow-down-icon plus" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 11.5V20.5H11V11.5H20V9.5H11V0.5H9V9.5H0V11.5H9Z" fill="#05BCB9"/>
                                </svg>
                                <svg class="icon arrow-down-icon minus" width="20" height="3" viewBox="0 0 20 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.5H20V2.5H0V0.5Z" fill="white"/>
                                </svg>

                            </div>
                        </div>
                        <div class="panel">
                            <div class="answer">
                                Для этого вам нужно зарегистрироваться и заполнить ваш профиль на платформе NAVI-AVA . Возможно некоторое время к вам не будет приходить заявки на Наставничество или консультирование. Не спешите с выводами , так как сервис новый и мало кто еще знает про платформу NAVI-AVA , может немного затянуться этот вопрос. Но здесь у нас есть другая функция, где вы сами можете найти и подобрать себе учеников/менти вашу сторону.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-block">
                        <div class="accordion">
                            Как мне стать наставником-консультантом или платным консультантом?

                            <div class="svg-block">
                                <svg class="icon arrow-down-icon plus" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 11.5V20.5H11V11.5H20V9.5H11V0.5H9V9.5H0V11.5H9Z" fill="#05BCB9"/>
                                </svg>
                                <svg class="icon arrow-down-icon minus" width="20" height="3" viewBox="0 0 20 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.5H20V2.5H0V0.5Z" fill="white"/>
                                </svg>

                            </div>
                        </div>
                        <div class="panel">
                            <div class="answer">
                                Для этого вам нужно зарегистрироваться и заполнить ваш профиль на платформе NAVI-AVA . Возможно некоторое время к вам не будет приходить заявки на Наставничество или консультирование. Не спешите с выводами , так как сервис новый и мало кто еще знает про платформу NAVI-AVA , может немного затянуться этот вопрос. Но здесь у нас есть другая функция, где вы сами можете найти и подобрать себе учеников/менти вашу сторону.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-block">
                        <div class="accordion">
                            Как мне найти наставника-консультанта?
                            <div class="svg-block">
                                <svg class="icon arrow-down-icon plus" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 11.5V20.5H11V11.5H20V9.5H11V0.5H9V9.5H0V11.5H9Z" fill="#05BCB9"/>
                                </svg>
                                <svg class="icon arrow-down-icon minus" width="20" height="3" viewBox="0 0 20 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.5H20V2.5H0V0.5Z" fill="white"/>
                                </svg>

                            </div>
                        </div>
                        <div class="panel">
                            <div class="answer">
                                Для этого вам нужно зарегистрироваться и заполнить ваш профиль на платформе NAVI-AVA . Возможно некоторое время к вам не будет приходить заявки на Наставничество или консультирование. Не спешите с выводами , так как сервис новый и мало кто еще знает про платформу NAVI-AVA , может немного затянуться этот вопрос. Но здесь у нас есть другая функция, где вы сами можете найти и подобрать себе учеников/менти вашу сторону.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="s-questions">
        <div class="container">
            <div class="title">
                Остались вопросы?
            </div>
            <button class="btn-default-shadow medium-btn">
                Напишите нам
            </button>
        </div>
    </section>

@endsection
