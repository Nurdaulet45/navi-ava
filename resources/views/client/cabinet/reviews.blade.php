@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') Отзывы @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Отзывы @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me">
                <div class="about-me-form">
                    <div class="category-tabs">
                        <div class="category-tab-item">
                            Все
                        </div>
                        <div class="category-tab-item">
                            Новости
                        </div>
                        <div class="category-tab-item active">
                            Стати
                        </div>
                    </div>
                    <div class="review-items">
                        <div class="review-item">
                            <div class="head">
                                <div class="info">
                                    <img src="{{ asset('images/user-review.png') }}" width="61" height="61" alt="user-review">
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
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>


                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z" fill="#C5C4C3"></path>
                                        </svg>
                                    </div>

                                </div>
                            </div>
                            <div class="medium-small-text dark-charcoal-text">
                                Внимательный и терпеливый наставник, хорошо знает материал и умеет задавать сложные вопросы которые заставляют думать, рекомендую.
                            </div>
                            <div class="comment-reply">
                                <div class="comment-reply-image">
                                    <img src="{{ asset('images/user-review1.png') }}" width="61" height="61" alt="user-review">
                                </div>
                                <div class="comment-reply-body w-100">

                                    <div class="name">
                                        Вадим Чумуков
                                    </div>
                                    <div class="comment-enter">
                                        <textarea name="" id="" cols="30" rows="2.8"
                                                  class="form-control textarea-default w-100"
                                                  placeholder="Напишите что-нибудь"></textarea>
                                        <div class="buttons">
                                            <button class="btn-default small-btn h-45">
                                                Отправить
                                            </button>
                                            <button class="btn-white-green small-btn h-45">
                                                Отменить
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="line"></div>
                        <div class="review-item">
                            <div class="head">
                                <div class="info">
                                    <img src="{{ asset('images/user-review.png') }}" width="61" height="61" alt="user-review">
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
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>


                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z" fill="#C5C4C3"></path>
                                        </svg>
                                    </div>

                                </div>
                            </div>
                            <div class="medium-small-text dark-charcoal-text">
                                Внимательный и терпеливый наставник, хорошо знает материал и умеет задавать сложные вопросы которые заставляют думать, рекомендую.
                            </div>
                            <a class="comment" href="">
                                Комментировать
                            </a>

                        </div>
                        <div class="line"></div>
                        <div class="review-item">
                            <div class="head">
                                <div class="info">
                                    <img src="{{ asset('images/user-review.png') }}" width="61" height="61" alt="user-review">
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
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>


                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z" fill="#C5C4C3"></path>
                                        </svg>
                                    </div>

                                </div>
                            </div>
                            <div class="medium-small-text dark-charcoal-text">
                                Внимательный и терпеливый наставник, хорошо знает материал и умеет задавать сложные вопросы которые заставляют думать, рекомендую.
                            </div>
                            <a class="comment" href="">
                                Комментировать
                            </a>

                        </div>
                        <div class="line"></div>
                        <div class="review-item">
                            <div class="head">
                                <div class="info">
                                    <img src="{{ asset('images/user-review.png') }}" width="61" height="61" alt="user-review">
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
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>


                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z" fill="#E0C01A"></path>
                                        </svg>

                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855 12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z" fill="#C5C4C3"></path>
                                        </svg>
                                    </div>

                                </div>
                            </div>
                            <div class="medium-small-text dark-charcoal-text">
                                А ещё ключевые особенности структуры проекта лишь добавляют фракционных разногласий и функционально разнесены на независимые элементы. Кстати, независимые государства заблокированы в рамках своих собственных рациональных ограничений. Также как реализация намеченных плановых заданий прекрасно подходит для реализации анализа существующих паттернов поведения. Также как реализация намеченных плановых заданий прекрасно подходит для реализации анализа существующих паттернов поведения.
                            </div>
                            <a class="comment" href="">
                                Комментировать
                            </a>

                        </div>
                    </div>
                    <button class="btn-white-green medium-btn w-100 btn-load-more">
                        Показать еще
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.7929 2.29289C13.1834 1.90237 13.8166 1.90237 14.2071 2.29289L17.2071 5.29289C17.5976 5.68342 17.5976 6.31658 17.2071 6.70711L14.2071 9.70711C13.8166 10.0976 13.1834 10.0976 12.7929 9.70711C12.4024 9.31658 12.4024 8.68342 12.7929 8.29289L14.0858 7H12.5C8.95228 7 6 9.95228 6 13.5C6 17.0477 8.95228 20 12.5 20C16.0477 20 19 17.0477 19 13.5C19 12.9477 19.4477 12.5 20 12.5C20.5523 12.5 21 12.9477 21 13.5C21 18.1523 17.1523 22 12.5 22C7.84772 22 4 18.1523 4 13.5C4 8.84772 7.84772 5 12.5 5H14.0858L12.7929 3.70711C12.4024 3.31658 12.4024 2.68342 12.7929 2.29289Z" fill="#1DC0BD"></path>
                        </svg>
                    </button>

                </div>
                <div class="about-right">

                    @include('client.components.aboutMeSidebar')
                    @include('client.components.cabinetSidebar')
                </div>
            </div>
        </div>
    </section>
    @include('client.components.sectionWriteToUs', ['gray'  => true])

@endsection
