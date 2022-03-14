@extends('layouts.app')
@section('content')
    <section class="s-mentor-head">
        <img src="{{ asset('/images/bg-mentor-page-head.png') }}" alt="mentor-page-head" width="100%" height="100%">
    </section>
    <section class="s-mentor">
        <div class="container">
            <div class="mentor-page">
                <div class="mentor-page__left">
                    <div class="user-photo">
                        <img src="{{ asset('images/mentor-image.png') }}" width="100%" height="auto" alt="Mentor">
                    </div>
                    <button class="btn-default small-btn w-100">
                        Начать диалог
                    </button>
                    <div class="btn-white-green medium-btn w-100">
                        Добавить в избранное
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.49968 3.01843C6.92913 1.61126 4.51384 1.66231 3.00458 3.17157C1.44248 4.73367 1.44248 7.26633 3.00458 8.8284L7.55688 13.3807C8.07754 13.9014 8.92181 13.9014 9.44248 13.3807L13.9947 8.8284C15.5569 7.26633 15.5569 4.73367 13.9947 3.17157C12.4855 1.66231 10.0702 1.61126 8.49968 3.01843ZM7.71861 4.11438L8.02828 4.42403C8.28861 4.68437 8.71074 4.68437 8.97108 4.42403L9.28074 4.11438C10.3221 3.07299 12.0105 3.07299 13.0519 4.11438C14.0933 5.15578 14.0933 6.8442 13.0519 7.8856L8.49968 12.4379L3.94739 7.8856C2.906 6.8442 2.906 5.15578 3.94739 4.11438C4.98879 3.07299 6.67723 3.07299 7.71861 4.11438Z"
                                fill="#1DC0BD"/>
                        </svg>
                    </div>

                    <div class="review">
                        <div class="rate">
                            4.5
                            <span>15 отзывов</span>
                        </div>
                        <div class="stars">
                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                    fill="#E0C01A"/>
                            </svg>

                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                    fill="#E0C01A"/>
                            </svg>

                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                    fill="#E0C01A"/>
                            </svg>


                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                    fill="#E0C01A"/>
                            </svg>

                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z"
                                    fill="#C5C4C3"/>
                            </svg>
                        </div>

                    </div>

                </div>
                <div class="mentor-page__right">
                    <div class="mentor-hero-block">
                        <div class="mentor-block-user-name">
                            <div class="user-info">
                                <p class="name">
                                    {{ $mentor->user->firstNameAndLetterLastNameCustom }}
                                    <span>, {{ $mentor->user->login }}</span>
                                </p>
                                <p class="work">
                                    {{ $mentor->specialization_text ?: '' }}
                                </p>
                                <p class="city">
                                    {{ $mentor->user->countryAddressCustom }}
                                </p>
                            </div>
                            <div class="status-price-block">
                                <div class="status">
                                    Свободен
                                </div>
                                <div class="price">
                                    3000 ₽ / час
                                </div>
                            </div>
                        </div>

                        @if($mentor->specializationName())
                            <div class="line"></div>
                            <div class="mentor-block-info">
                                <div class="info-title">
                                    Сфера деятельности
                                </div>
                                <div class="info-description">
                                    {{ $mentor->specializationName() }}
                                </div>
                            </div>
                        @endif

                        @empty(!json_decode($mentor->skills))
                            <div class="line"></div>
                            <div class="mentor-block-info">
                                <div class="info-title">
                                    Ключевые слова / навыки
                                </div>
                                <div class="skill-items">
                                    @foreach(json_decode($mentor->skills) as $skill)
                                        <div class="skill-item">
                                            {{ $skill }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endempty

                        @if($mentor->skills_description)
                            <div class="line"></div>
                            <div class="mentor-block-info">
                                <div class="info-title">
                                    C чем могу помочь
                                </div>
                                <div class="info-description">
                                    <ol>
                                        <li>{{ $mentor->skills_description }}</li>
                                        {{-- <li>QA и тестирование - общие вопросы, выбор направления для обучения и развития.</li>--}}
                                    </ol>
                                </div>
                            </div>
                        @endif

                        @if($mentor->about_me)
                            <div class="line"></div>
                            <div class="mentor-block-info">
                                <div class="info-title">
                                    О себе
                                </div>
                                <div class="info-description">
                                    {{ $mentor->about_me }}
                                </div>
                            </div>
                        @endif

                        <div class="line"></div>
                        <div class="mentor-block-info">
                            <div class="info-title">
                                Дипломы, сертификаты и курсы
                            </div>
                            <div class="mentor-block-certificates">
                                @foreach($mentor->certifications($mentor->user_id,$mentor->role_name) as $certificate)
                                    <div class="certificate-card">
                                        <div class="left">
                                            <div class="info-title">
                                                {{ $certificate->name }}
                                            </div>
                                            <div class="info-description">
                                                {{ $certificate->description }}
                                            </div>
                                        </div>
                                        @if($certificate->image)
                                            <div class="right">
                                                <img src="{{ $certificate->certificateImage }}" alt="certificate">
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="mentor-reviews">
                            <div class="head">
                                <div class="info-title">
                                    Отзывы (56)
                                </div>
                                <div class="write">
                                    Написать отзыв
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.7929 2.29289C17.1834 1.90237 17.8166 1.90237 18.2071 2.29289L22.2071 6.29289C22.5976 6.68342 22.5976 7.31658 22.2071 7.70711L9.20711 20.7071C9.01957 20.8946 8.76522 21 8.5 21H4.5C3.94772 21 3.5 20.5523 3.5 20L3.5 16C3.5 15.7348 3.60536 15.4804 3.79289 15.2929L13.7927 5.2931L16.7929 2.29289ZM14.5 7.41421L5.5 16.4142L5.5 19H8.08579L17.0858 10L14.5 7.41421ZM18.5 8.58579L20.0858 7L17.5 4.41421L15.9142 6L18.5 8.58579Z"
                                            fill="#1DC0BD"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="review-items">
                                <div class="review-item">
                                    <div class="head">
                                        <div class="info">
                                            <img src="{{ asset('images/user-review-female.png') }}" width="61"
                                                 height="61" alt="user-review">
                                            <div class="user">
                                                <div class="name">
                                                    Оля К
                                                </div>
                                                <div class="position">
                                                    Предприниматель
                                                </div>
                                            </div>
                                        </div>
                                        <div class="date">
                                            25 августа, 2021
                                            <div class="stars">
                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>


                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z"
                                                        fill="#C5C4C3"/>
                                                </svg>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="medium-small-text dark-charcoal-text">
                                        Внимательный и терпеливый наставник, хорошо знает материал и умеет задавать
                                        сложные вопросы которые заставляют думать, рекомендую.
                                    </div>
                                    <a class="comment" href="">
                                        Комментировать
                                    </a>

                                </div>
                                <div class="line"></div>
                                <div class="review-item">
                                    <div class="head">
                                        <div class="info">
                                            <img src="{{ asset('images/user-review-female.png') }}" width="61"
                                                 height="61" alt="user-review">
                                            <div class="user">
                                                <div class="name">
                                                    Оля К
                                                </div>
                                                <div class="position">
                                                    Предприниматель
                                                </div>
                                            </div>
                                        </div>
                                        <div class="date">
                                            25 августа, 2021
                                            <div class="stars">
                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>


                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z"
                                                        fill="#C5C4C3"/>
                                                </svg>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="medium-small-text dark-charcoal-text">
                                        Внимательный и терпеливый наставник, хорошо знает материал и умеет задавать
                                        сложные вопросы которые заставляют думать, рекомендую.
                                    </div>
                                    <a class="comment" href="">
                                        Комментировать
                                    </a>

                                </div>
                                <div class="line"></div>
                                <div class="review-item">
                                    <div class="head">
                                        <div class="info">
                                            <img src="{{ asset('images/user-review-female.png') }}" width="61"
                                                 height="61" alt="user-review">
                                            <div class="user">
                                                <div class="name">
                                                    Оля К
                                                </div>
                                                <div class="position">
                                                    Предприниматель
                                                </div>
                                            </div>
                                        </div>
                                        <div class="date">
                                            25 августа, 2021
                                            <div class="stars">
                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>


                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z"
                                                        fill="#C5C4C3"/>
                                                </svg>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="medium-small-text dark-charcoal-text">
                                        Внимательный и терпеливый наставник, хорошо знает материал и умеет задавать
                                        сложные вопросы которые заставляют думать, рекомендую.
                                    </div>
                                    <a class="comment" href="">
                                        Комментировать
                                    </a>

                                </div>
                                <div class="line"></div>
                                <div class="review-item">
                                    <div class="head">
                                        <div class="info">
                                            <img src="{{ asset('images/user-review-female.png') }}" width="61"
                                                 height="61" alt="user-review">
                                            <div class="user">
                                                <div class="name">
                                                    Frederico
                                                </div>
                                                <div class="position">
                                                    Developer JAVA
                                                </div>
                                            </div>
                                        </div>
                                        <div class="date">
                                            25 августа, 2021
                                            <div class="stars">
                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>


                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                        fill="#E0C01A"/>
                                                </svg>

                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z"
                                                        fill="#C5C4C3"/>
                                                </svg>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="medium-small-text dark-charcoal-text">
                                        А ещё ключевые особенности структуры проекта лишь добавляют фракционных
                                        разногласий и функционально разнесены на независимые элементы. Кстати,
                                        независимые государства заблокированы в рамках своих собственных рациональных
                                        ограничений. Также как реализация намеченных плановых заданий прекрасно подходит
                                        для реализации анализа существующих паттернов поведения. Также как реализация
                                        намеченных плановых заданий прекрасно подходит для реализации анализа
                                        существующих паттернов поведения.
                                    </div>
                                    <a class="comment" href="">
                                        Комментировать
                                    </a>

                                </div>
                                <button class="btn-default medium-btn  btn-load-more">
                                    Показать еще
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.7929 2.29289C13.1834 1.90237 13.8166 1.90237 14.2071 2.29289L17.2071 5.29289C17.5976 5.68342 17.5976 6.31658 17.2071 6.70711L14.2071 9.70711C13.8166 10.0976 13.1834 10.0976 12.7929 9.70711C12.4024 9.31658 12.4024 8.68342 12.7929 8.29289L14.0858 7H12.5C8.95228 7 6 9.95228 6 13.5C6 17.0477 8.95228 20 12.5 20C16.0477 20 19 17.0477 19 13.5C19 12.9477 19.4477 12.5 20 12.5C20.5523 12.5 21 12.9477 21 13.5C21 18.1523 17.1523 22 12.5 22C7.84772 22 4 18.1523 4 13.5C4 8.84772 7.84772 5 12.5 5H14.0858L12.7929 3.70711C12.4024 3.31658 12.4024 2.68342 12.7929 2.29289Z"
                                            fill="#1DC0BD"/>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @include('client.components.sectionWriteToUs', ['gray' => true])
@endsection
