@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb')
        @slot('title') Избранное @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Избранное @endslot
    @endcomponent
    <section class="s-about-me-page bg-white">
        <div class="container">
                <div class="about-me">
                    <div class="favorites-mentors">
                        <div class="favorites-mentor cards">
                            <a class="mentor-info-card">
                                <div class="left">
                                    <img src="{{ asset('images/user-icon.png') }}" width="92px" data-widget="92px"
                                         alt="user icon">
                                    <div class="rate">
                                        4.5
                                    </div>
                                    <div class="review">
                                        15 отзывов
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
                                <div class="right">
                                    <div class="mentor-block-user-name">
                                        <p class="name">
                                            Артём М,<span> Artyom-S</span>
                                        </p>
                                        <div class="status">
                                            Свободен
                                        </div>
                                    </div>
                                    <div class="work">
                                        Разработчик - Яндекса
                                    </div>
                                    <div class="city">
                                        Москва, Россия
                                    </div>
                                    <div class="work-info">
                                        <div class="activity">
                                            <p class="medium-small-text gray-text">
                                                Сфера деятельности:
                                            </p>
                                            <p class="medium-small-text dark-charcoal-text">Менеджмент и управление</p>
                                        </div>
                                        <div class="skills">
                                            <p class="medium-small-text gray-text">
                                                Ключевые слова / навыки:
                                            </p>
                                            <div class="skill-items">
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    React
                                                </div>
                                                <div class="skill-item">
                                                    Redux
                                                </div>
                                                <div class="skill-item">
                                                    Node JS
                                                </div>
                                                <div class="skill-item">
                                                    UX
                                                </div>
                                                <div class="skill-item">
                                                    Интерфейсы
                                                </div>
                                                <div class="skill-item">
                                                    ...
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="buttons">
                                            <a href="" class="btn-default-shadow small-btn">
                                                Связаться
                                            </a>
                                            <button class="btn-white-green w-auto">
                                                Убрать из избранного

                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.4987 3.01843C6.92815 1.61126 4.51287 1.66231 3.00361 3.17157C1.44151 4.73367 1.44151 7.26633 3.00361 8.8284L7.5559 13.3807C8.07657 13.9014 8.92083 13.9014 9.4415 13.3807L13.9938 8.8284C15.5559 7.26633 15.5559 4.73367 13.9938 3.17157C12.4845 1.66231 10.0692 1.61126 8.4987 3.01843ZM7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                    <path
                                                        d="M7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                </svg>


                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="mentor-info-card">
                                <div class="left">
                                    <img src="{{ asset('images/user-icon.png') }}" width="92px" data-widget="92px"
                                         alt="user icon">
                                    <div class="rate">
                                        4.5
                                    </div>
                                    <div class="review">
                                        15 отзывов
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
                                <div class="right">
                                    <div class="mentor-block-user-name">
                                        <p class="name">
                                            Артём М,<span> Artyom-S</span>
                                        </p>
                                        <div class="status">
                                            Свободен
                                        </div>
                                    </div>
                                    <div class="work">
                                        Разработчик - Яндекса
                                    </div>
                                    <div class="city">
                                        Москва, Россия
                                    </div>
                                    <div class="work-info">
                                        <div class="activity">
                                            <p class="medium-small-text gray-text">
                                                Сфера деятельности:
                                            </p>
                                            <p class="medium-small-text dark-charcoal-text">Менеджмент и управление</p>
                                        </div>
                                        <div class="skills">
                                            <p class="medium-small-text gray-text">
                                                Ключевые слова / навыки:
                                            </p>
                                            <div class="skill-items">
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    React
                                                </div>
                                                <div class="skill-item">
                                                    Redux
                                                </div>
                                                <div class="skill-item">
                                                    Node JS
                                                </div>
                                                <div class="skill-item">
                                                    UX
                                                </div>
                                                <div class="skill-item">
                                                    Интерфейсы
                                                </div>
                                                <div class="skill-item">
                                                    ...
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="buttons">
                                            <a href="" class="btn-default-shadow small-btn">
                                                Связаться
                                            </a>
                                            <div class="btn-white-green w-auto">
                                                Убрать из избранного

                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.4987 3.01843C6.92815 1.61126 4.51287 1.66231 3.00361 3.17157C1.44151 4.73367 1.44151 7.26633 3.00361 8.8284L7.5559 13.3807C8.07657 13.9014 8.92083 13.9014 9.4415 13.3807L13.9938 8.8284C15.5559 7.26633 15.5559 4.73367 13.9938 3.17157C12.4845 1.66231 10.0692 1.61126 8.4987 3.01843ZM7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                    <path
                                                        d="M7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                </svg>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="mentor-info-card">
                                <div class="left">
                                    <img src="{{ asset('images/user-icon.png') }}" width="92px" data-widget="92px"
                                         alt="user icon">
                                    <div class="rate">
                                        4.5
                                    </div>
                                    <div class="review">
                                        15 отзывов
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
                                <div class="right">
                                    <div class="mentor-block-user-name">
                                        <p class="name">
                                            Артём М,<span> Artyom-S</span>
                                        </p>
                                        <div class="status">
                                            Свободен
                                        </div>
                                    </div>
                                    <div class="work">
                                        Разработчик - Яндекса
                                    </div>
                                    <div class="city">
                                        Москва, Россия
                                    </div>
                                    <div class="work-info">
                                        <div class="activity">
                                            <p class="medium-small-text gray-text">
                                                Сфера деятельности:
                                            </p>
                                            <p class="medium-small-text dark-charcoal-text">Менеджмент и управление</p>
                                        </div>
                                        <div class="skills">
                                            <p class="medium-small-text gray-text">
                                                Ключевые слова / навыки:
                                            </p>
                                            <div class="skill-items">
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    React
                                                </div>
                                                <div class="skill-item">
                                                    Redux
                                                </div>
                                                <div class="skill-item">
                                                    Node JS
                                                </div>
                                                <div class="skill-item">
                                                    UX
                                                </div>
                                                <div class="skill-item">
                                                    Интерфейсы
                                                </div>
                                                <div class="skill-item">
                                                    ...
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="buttons">
                                            <a href="" class="btn-default-shadow small-btn">
                                                Связаться
                                            </a>
                                            <div class="btn-white-green w-auto">
                                                Убрать из избранного

                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.4987 3.01843C6.92815 1.61126 4.51287 1.66231 3.00361 3.17157C1.44151 4.73367 1.44151 7.26633 3.00361 8.8284L7.5559 13.3807C8.07657 13.9014 8.92083 13.9014 9.4415 13.3807L13.9938 8.8284C15.5559 7.26633 15.5559 4.73367 13.9938 3.17157C12.4845 1.66231 10.0692 1.61126 8.4987 3.01843ZM7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                    <path
                                                        d="M7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                </svg>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="catalog-ad-card">
                                <h4>Рекламное объявление</h4>
                                <a>Получите чек-лист по профессиям</a>
                            </div>
                            <a class="mentor-info-card">
                                <div class="left">
                                    <img src="{{ asset('images/user-icon.png') }}" width="92px" data-widget="92px"
                                         alt="user icon">
                                    <div class="rate">
                                        4.5
                                    </div>
                                    <div class="review">
                                        15 отзывов
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
                                <div class="right">
                                    <div class="mentor-block-user-name">
                                        <p class="name">
                                            Артём М,<span> Artyom-S</span>
                                        </p>
                                        <div class="status">
                                            Свободен
                                        </div>
                                    </div>
                                    <div class="work">
                                        Разработчик - Яндекса
                                    </div>
                                    <div class="city">
                                        Москва, Россия
                                    </div>
                                    <div class="work-info">
                                        <div class="activity">
                                            <p class="medium-small-text gray-text">
                                                Сфера деятельности:
                                            </p>
                                            <p class="medium-small-text dark-charcoal-text">Менеджмент и управление</p>
                                        </div>
                                        <div class="skills">
                                            <p class="medium-small-text gray-text">
                                                Ключевые слова / навыки:
                                            </p>
                                            <div class="skill-items">
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    React
                                                </div>
                                                <div class="skill-item">
                                                    Redux
                                                </div>
                                                <div class="skill-item">
                                                    Node JS
                                                </div>
                                                <div class="skill-item">
                                                    UX
                                                </div>
                                                <div class="skill-item">
                                                    Интерфейсы
                                                </div>
                                                <div class="skill-item">
                                                    ...
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="buttons">
                                            <a href="" class="btn-default-shadow small-btn">
                                                Связаться
                                            </a>
                                            <div class="btn-white-green w-auto">
                                                Убрать из избранного

                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.4987 3.01843C6.92815 1.61126 4.51287 1.66231 3.00361 3.17157C1.44151 4.73367 1.44151 7.26633 3.00361 8.8284L7.5559 13.3807C8.07657 13.9014 8.92083 13.9014 9.4415 13.3807L13.9938 8.8284C15.5559 7.26633 15.5559 4.73367 13.9938 3.17157C12.4845 1.66231 10.0692 1.61126 8.4987 3.01843ZM7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                    <path
                                                        d="M7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="mentor-info-card">
                                <div class="left">
                                    <img src="{{ asset('images/user-icon.png') }}" width="92px" data-widget="92px"
                                         alt="user icon">
                                    <div class="rate">
                                        4.5
                                    </div>
                                    <div class="review">
                                        15 отзывов
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
                                <div class="right">
                                    <div class="mentor-block-user-name">
                                        <p class="name">
                                            Артём М,<span> Artyom-S</span>
                                        </p>
                                        <div class="status">
                                            Свободен
                                        </div>
                                    </div>
                                    <div class="work">
                                        Разработчик - Яндекса
                                    </div>
                                    <div class="city">
                                        Москва, Россия
                                    </div>
                                    <div class="work-info">
                                        <div class="activity">
                                            <p class="medium-small-text gray-text">
                                                Сфера деятельности:
                                            </p>
                                            <p class="medium-small-text dark-charcoal-text">Менеджмент и управление</p>
                                        </div>
                                        <div class="skills">
                                            <p class="medium-small-text gray-text">
                                                Ключевые слова / навыки:
                                            </p>
                                            <div class="skill-items">
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    Java Script
                                                </div>
                                                <div class="skill-item">
                                                    React
                                                </div>
                                                <div class="skill-item">
                                                    Redux
                                                </div>
                                                <div class="skill-item">
                                                    Node JS
                                                </div>
                                                <div class="skill-item">
                                                    UX
                                                </div>
                                                <div class="skill-item">
                                                    Интерфейсы
                                                </div>
                                                <div class="skill-item">
                                                    ...
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="buttons">
                                            <a href="" class="btn-default-shadow small-btn">
                                                Связаться
                                            </a>
                                            <div class="btn-white-green w-auto">
                                                Убрать из избранного

                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.4987 3.01843C6.92815 1.61126 4.51287 1.66231 3.00361 3.17157C1.44151 4.73367 1.44151 7.26633 3.00361 8.8284L7.5559 13.3807C8.07657 13.9014 8.92083 13.9014 9.4415 13.3807L13.9938 8.8284C15.5559 7.26633 15.5559 4.73367 13.9938 3.17157C12.4845 1.66231 10.0692 1.61126 8.4987 3.01843ZM7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                    <path
                                                        d="M7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                        fill="#1DC0BD"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <button class="btn-white-green large-btn w-100 btn-load-more">
                            Показать еще
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.7929 2.29289C13.1834 1.90237 13.8166 1.90237 14.2071 2.29289L17.2071 5.29289C17.5976 5.68342 17.5976 6.31658 17.2071 6.70711L14.2071 9.70711C13.8166 10.0976 13.1834 10.0976 12.7929 9.70711C12.4024 9.31658 12.4024 8.68342 12.7929 8.29289L14.0858 7H12.5C8.95228 7 6 9.95228 6 13.5C6 17.0477 8.95228 20 12.5 20C16.0477 20 19 17.0477 19 13.5C19 12.9477 19.4477 12.5 20 12.5C20.5523 12.5 21 12.9477 21 13.5C21 18.1523 17.1523 22 12.5 22C7.84772 22 4 18.1523 4 13.5C4 8.84772 7.84772 5 12.5 5H14.0858L12.7929 3.70711C12.4024 3.31658 12.4024 2.68342 12.7929 2.29289Z"
                                    fill="#1DC0BD"></path>
                            </svg>
                        </button>
                        <div class="pagination">
                            <div class="prev">

                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.2561 15.5894C12.5815 15.264 12.5815 14.7363 12.2561 14.4109L7.84534 10.0002L12.2561 5.58941C12.5815 5.264 12.5815 4.73633 12.2561 4.41091C11.9307 4.0855 11.403 4.0855 11.0776 4.41091L6.07757 9.41091C5.75214 9.73633 5.75214 10.264 6.07757 10.5894L11.0776 15.5894C11.403 15.9149 11.9307 15.9149 12.2561 15.5894Z"
                                        fill="#1DC0BD"></path>
                                </svg>

                            </div>
                            <div class="page-numbers">
                                <div class="page-number active">

                                    1
                                </div>
                                <div class="page-number">
                                    2
                                </div>
                                <div class="page-number">
                                    3
                                </div>
                                <div class="page-number">
                                    4
                                </div>
                                <div class="page-number">
                                    ...
                                </div>
                                <div class="page-number">
                                    5
                                </div>
                            </div>
                            <div class="next">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.74392 15.5894C7.41851 15.264 7.41851 14.7363 7.74392 14.4109L12.1547 10.0002L7.74392 5.58941C7.4185 5.264 7.4185 4.73633 7.74392 4.41091C8.06934 4.0855 8.597 4.0855 8.92242 4.41091L13.9224 9.41091C14.2479 9.73633 14.2479 10.264 13.9224 10.5894L8.92242 15.5894C8.597 15.9149 8.06934 15.9149 7.74392 15.5894Z"
                                        fill="#1DC0BD"></path>
                                </svg>
                            </div>
                        </div>
                    </div>


                    <div class="about-right ad-sidebar">
                        <h4>
                            Ответим на все вопросы
                        </h4>
                        <p>Рекламный баннер призывающий регистрироваться и находить наставников</p>
                    </div>
                </div>
                <div class="empty-favorites mt-10" >
                    <h4>Здесь пока никого нет</h4>
                    <p>Нажимайте
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.49968 3.01843C6.92913 1.61126 4.51384 1.66231 3.00458 3.17157C1.44248 4.73367 1.44248 7.26633 3.00458 8.8284L7.55688 13.3807C8.07754 13.9014 8.92181 13.9014 9.44248 13.3807L13.9947 8.8284C15.5569 7.26633 15.5569 4.73367 13.9947 3.17157C12.4855 1.66231 10.0702 1.61126 8.49968 3.01843ZM7.71861 4.11438L8.02828 4.42403C8.28861 4.68437 8.71074 4.68437 8.97108 4.42403L9.28074 4.11438C10.3221 3.07299 12.0105 3.07299 13.0519 4.11438C14.0933 5.15578 14.0933 6.8442 13.0519 7.8856L8.49968 12.4379L3.94739 7.8856C2.906 6.8442 2.906 5.15578 3.94739 4.11438C4.98879 3.07299 6.67723 3.07299 7.71861 4.11438Z"
                                fill="#1DC0BD"/>
                        </svg>, чтобы сохранять наставников в избранное</p>
                    <button class="btn-default medium-btn">
                        Перейти в каталог
                    </button>
                </div>
        </div>
    </section>
    @include('client.components.sectionWriteToUs')

@endsection
