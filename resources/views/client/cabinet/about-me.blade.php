@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') О себе @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') О себе @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me">
                <div class="about-me-form">
                    <div class="form-group photo-form-group">
                        <label>
                            Фото
                        </label>
                        <div class="photo">
                            <img class="user-profile-image" src="{{ asset('images/user-profile-icon.png') }}"
                                 alt="user-profile">
                            <div class="buttons">
                                <button class="btn-default small-btn">
                                    Загрузить фото
                                </button>
                                <div class="info-text">
                                    <div class="dropdown-menu dropdown-about-me">
                                <span class="dropdown-body">
                                      <svg width="20" class="icon-info" height="20" viewBox="0 0 20 20" fill="none"
                                           xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.99935 3.33341C6.31745 3.33341 3.33268 6.31818 3.33268 10.0001C3.33268 13.682 6.31745 16.6667 9.99935 16.6667C13.6813 16.6667 16.666 13.682 16.666 10.0001C16.666 6.31818 13.6813 3.33341 9.99935 3.33341ZM1.66602 10.0001C1.66602 5.39771 5.39697 1.66675 9.99935 1.66675C14.6017 1.66675 18.3327 5.39771 18.3327 10.0001C18.3327 14.6024 14.6017 18.3334 9.99935 18.3334C5.39697 18.3334 1.66602 14.6024 1.66602 10.0001Z"
                                        fill="#D6FFFE"/>
                                    <path
                                        d="M9.99935 8.33325C10.4596 8.33325 10.8327 8.70634 10.8327 9.16659V14.1666C10.8327 14.6268 10.4596 14.9999 9.99935 14.9999C9.5391 14.9999 9.16602 14.6268 9.16602 14.1666V9.16659C9.16602 8.70634 9.5391 8.33325 9.99935 8.33325Z"
                                        fill="#D6FFFE"/>
                                    <path
                                        d="M11.25 6.25C11.25 6.94036 10.6903 7.5 10 7.5C9.30967 7.5 8.75 6.94036 8.75 6.25C8.75 5.55964 9.30967 5 10 5C10.6903 5 11.25 5.55964 11.25 6.25Z"
                                        fill="#D6FFFE"/>
                                </svg>
                                </span>
                                        <div class="dropdown-content dropdown-about-me-content">
                                            Минимальные пропорции: 120x120 пикселе
                                        </div>
                                    </div>
                                    Минимальные пропорции: 120x120 пикселей
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Логин</label>
                        <input type="text" class="form-control input-default" placeholder="Логин">
                    </div>
                    <div class="form-group">
                        <label for="">Как вас зовут?</label>
                        <div class="inputs">
                            <input type="text" class="form-control input-default" placeholder="Имя">
                            <input type="text" class="form-control input-default" placeholder="Фамилия">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Откуда вы?</label>
                        <div class="inputs">
                            <select class="form-control select-default">
                                <option value="" selected>Страна</option>
                                <option value="Казахстан">Казахстан</option>
                                <option value="Узбекистан">Узбекистан</option>
                                <option value="Россия">Россия</option>
                                <option value="Китай">Китай</option>
                            </select>
                            <input type="text" class="form-control input-default"
                                   placeholder="Адрес (населенный пункт, город,район)">
                        </div>
                    </div>
                    <div class="form-group sex-form-group">
                        <label for="">Пол</label>
                        <div class="input-items">
                            <label class="label-default-radio">Мужской
                                <input type="radio" name="radio" value="man" checked>
                                <span class="checkmark"></span>
                            </label>
                            <label class="label-default-radio">Женский
                                <input type="radio" name="radio" value="women">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">
                            С чем можете помочь
                            <div class="dropdown-menu dropdown-help-info">
                        <span class="dropdown-body">
                              <svg width="20" class="icon-info" height="20" viewBox="0 0 20 20" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.99935 3.33341C6.31745 3.33341 3.33268 6.31818 3.33268 10.0001C3.33268 13.682 6.31745 16.6667 9.99935 16.6667C13.6813 16.6667 16.666 13.682 16.666 10.0001C16.666 6.31818 13.6813 3.33341 9.99935 3.33341ZM1.66602 10.0001C1.66602 5.39771 5.39697 1.66675 9.99935 1.66675C14.6017 1.66675 18.3327 5.39771 18.3327 10.0001C18.3327 14.6024 14.6017 18.3334 9.99935 18.3334C5.39697 18.3334 1.66602 14.6024 1.66602 10.0001Z"
                                fill="#D6FFFE"/>
                            <path
                                d="M9.99935 8.33325C10.4596 8.33325 10.8327 8.70634 10.8327 9.16659V14.1666C10.8327 14.6268 10.4596 14.9999 9.99935 14.9999C9.5391 14.9999 9.16602 14.6268 9.16602 14.1666V9.16659C9.16602 8.70634 9.5391 8.33325 9.99935 8.33325Z"
                                fill="#D6FFFE"/>
                            <path
                                d="M11.25 6.25C11.25 6.94036 10.6903 7.5 10 7.5C9.30967 7.5 8.75 6.94036 8.75 6.25C8.75 5.55964 9.30967 5 10 5C10.6903 5 11.25 5.55964 11.25 6.25Z"
                                fill="#D6FFFE"/>
                        </svg>
                        </span>
                                <div class="dropdown-content dropdown-help-info-content">
                                    Могу консультировать по (таким-то) тракторам, Рассказать о нюансах работы на них,
                                    как
                                    эффективно работать, какие поломки бывают, где купить или найти запчасти подешевле (
                                    могу дать контакты наших поставщиков). Как лучше работать на этих тракторах. Какая
                                    резина для баллонов качественнее и где найти. Какое масло в двигатель заливать для
                                    большего пробега. Как можно экономить диз.топливо. Сделать осмотр и определить
                                    техническое состояние при покупке трактора. Как лучше прогревать технику в зимнее
                                    время.
                                    и многое другое. Спрашивайте! Консультации, наставничество- всегда пожалуйста !
                                </div>
                            </div>

                        </label>
                        <textarea name="" class="form-control textarea-default" id="" cols="30" rows="6"
                                  placeholder="С какими навыками можете помочь?"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">
                            О себе
                            <div class="dropdown-menu dropdown-about-me">
                        <span class="dropdown-body">
                              <svg width="20" class="icon-info" height="20" viewBox="0 0 20 20" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.99935 3.33341C6.31745 3.33341 3.33268 6.31818 3.33268 10.0001C3.33268 13.682 6.31745 16.6667 9.99935 16.6667C13.6813 16.6667 16.666 13.682 16.666 10.0001C16.666 6.31818 13.6813 3.33341 9.99935 3.33341ZM1.66602 10.0001C1.66602 5.39771 5.39697 1.66675 9.99935 1.66675C14.6017 1.66675 18.3327 5.39771 18.3327 10.0001C18.3327 14.6024 14.6017 18.3334 9.99935 18.3334C5.39697 18.3334 1.66602 14.6024 1.66602 10.0001Z"
                                fill="#D6FFFE"/>
                            <path
                                d="M9.99935 8.33325C10.4596 8.33325 10.8327 8.70634 10.8327 9.16659V14.1666C10.8327 14.6268 10.4596 14.9999 9.99935 14.9999C9.5391 14.9999 9.16602 14.6268 9.16602 14.1666V9.16659C9.16602 8.70634 9.5391 8.33325 9.99935 8.33325Z"
                                fill="#D6FFFE"/>
                            <path
                                d="M11.25 6.25C11.25 6.94036 10.6903 7.5 10 7.5C9.30967 7.5 8.75 6.94036 8.75 6.25C8.75 5.55964 9.30967 5 10 5C10.6903 5 11.25 5.55964 11.25 6.25Z"
                                fill="#D6FFFE"/>
                        </svg>
                        </span>
                                <div class="dropdown-content dropdown-about-me-content">
                                    Расскажите о своей профессии, интересах, увлечениях, хобби
                                </div>
                            </div>
                        </label>
                        <textarea name="" class="form-control textarea-default" id="" cols="30" rows="6"
                                  placeholder="Напишите что-нибудь о себе"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="">Телефон</label>
                        <input type="text" class="form-control input-default" placeholder="+7 (___) - ___ - __ - __">
                    </div>
                    <div class="form-group">
                        <div class="head">
                            <label for="">
                                Шапка профиля
                            </label>
                            <button class="delete-text">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 4C7 2.89543 7.89543 2 9 2H15C16.1046 2 17 2.89543 17 4V6H18.9897C18.9959 5.99994 19.0021 5.99994 19.0083 6H21C21.5523 6 22 6.44772 22 7C22 7.55228 21.5523 8 21 8H19.9311L19.0638 20.1425C18.989 21.1891 18.1182 22 17.0689 22H6.93112C5.88184 22 5.01096 21.1891 4.9362 20.1425L4.06888 8H3C2.44772 8 2 7.55228 2 7C2 6.44772 2.44772 6 3 6H4.99174C4.99795 5.99994 5.00414 5.99994 5.01032 6H7V4ZM9 6H15V4H9V6ZM6.07398 8L6.93112 20H17.0689L17.926 8H6.07398Z"
                                        fill="#E40904"/>
                                </svg>
                                Удалить обложку
                            </button>
                        </div>
                        <textarea name="" class="form-control textarea-default" id="" cols="30" rows="6"
                                  placeholder="С какими навыками можете помочь?"></textarea>
                        <p class="warning-text"> Вы можете <span>удалить свой профиль</span></p>
                    </div>
                    <button class="btn-default small-btn w-100">
                        Сохранить
                    </button>
                    <div class="success-info-btn large-btn">

                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2.5C5.58172 2.5 2 6.08172 2 10.5C2 14.9183 5.58172 18.5 10 18.5C14.4183 18.5 18 14.9183 18 10.5C18 6.08172 14.4183 2.5 10 2.5ZM0 10.5C0 4.97715 4.47715 0.5 10 0.5C15.5228 0.5 20 4.97715 20 10.5C20 16.0228 15.5228 20.5 10 20.5C4.47715 20.5 0 16.0228 0 10.5ZM14.6644 7.25259C15.0771 7.61951 15.1143 8.25158 14.7474 8.6644L9.4141 14.6644C9.2243 14.8779 8.9523 15 8.6667 15C8.381 15 8.109 14.8779 7.91926 14.6644L5.25259 11.6644C4.88567 11.2516 4.92285 10.6195 5.33564 10.2526C5.74842 9.8857 6.38049 9.9229 6.74741 10.3356L8.6667 12.4948L13.2526 7.33564C13.6195 6.92285 14.2516 6.88567 14.6644 7.25259Z"
                                fill="#0CBD82"/>
                        </svg>
                        Все изменения сохранены

                    </div>
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
