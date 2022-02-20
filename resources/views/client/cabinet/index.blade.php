@extends('layouts.app')
@section('content')
    @if(!$user->is_email_confirmed)
        <section class="s-cabinet">
            <div class="wrapper alert-verify-email warning-verify-email">
                <div class="container">
                    <div class="alert-verify-email__block">
                        <div class="text">

                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.96116 2.16699C5.38783 2.16699 1.66699 5.90533 1.66699 10.5003C1.66699 15.0953 5.40533 18.8337 10.0003 18.8337C14.5953 18.8337 18.3337 15.0953 18.3337 10.5003C18.3337 5.90533 14.5778 2.16699 9.96116 2.16699ZM10.8337 14.667H9.16699V13.0003H10.8337V14.667ZM10.8337 11.3337H9.16699V6.33366H10.8337V11.3337Z"
                                    fill="#FF5500"/>
                            </svg>

                            Вам нужно активировать свой аккаунт ({{ $user->email }})
                            <a href="{{ route('cabinet.changeMail') }}">Изменить email</a>

                        </div>
                        <form id="sendVerifyEmailForm" method="post"
                              action="{{ route('cabinet.sendVerifyEmail.ajax') }}">
                            @method('POST')
                            @csrf

                            <button type="submit" class="btn-default medium-btn w-auto">
                                Отправить письмо повторно
                            </button>
                        </form>
                    </div>
                    <span class="invalid-feedback" id="error-verify_email-email" role="alert"></span>
                </div>
            </div>
        </section>
    @else
        @component('client.components.breadcrumb', ['gray' => true])
            @slot('title') Личный кабинет @endslot
            @slot('parent')@endslot
            @slot('active') Личный кабинет @endslot
        @endcomponent
        <section class="s-cabinet">

            <div class="container">

                <div class="wrapper">
                    <div class="cabinet-info">
                        <div class="mentor-block-user-name">
                            <div class="base-info">
                                <div class="user-image">
                                    <img src="{{ asset('images/user-icon.png') }}" alt="user-icon">
                                </div>
                                <div class="user-info">
                                    <p class="name">
                                        {{$user->firstNameAndLetterLastNameCustom}}
                                        {{ $user->ageCustom ? ", $user->ageCustom" . " " . __("site.years old") : ''}}
                                    </p>
                                    <p class="city">
                                        {{ $user->countryAddressCustom }}
                                    </p>
                                    @if(!\App\Services\SessionRoleService::isStudent())
                                        <p class="work">
                                            {{ $user->specializationTextCustom }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="status-price-block @if(!$user->is_accept_students)status-bg-red @endif" >
                                Статус
                                <div class="mentor">
                                    {{ \App\Services\SessionRoleService::textByRole('Наставник', 'Консультант', 'Ученик-менти') }}
                                    @if(!\App\Services\SessionRoleService::isStudent())
                                        <br>
                                        <div class="status">
                                            {{ $user->is_accept_students ? 'Свободен' : 'Занят' }}
                                        </div>
                                    @endif
                                </div>
                                @if(!\App\Services\SessionRoleService::isStudent())
                                    <div class="price">
                                        {{ $user->is_service_payable ?  "$user->service_price ₽ / час" : 'Бесплатная'}}
                                    </div>
                                @endif
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
                        <a href="{{ route('cabinet.aboutMe') }}">
                            Перейти
                        </a>
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
                        <a href="{{ route('cabinet.specialization') }}">Перейти</a>
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
                    @if(!\App\Services\SessionRoleService::isStudent())
                        <div class="profile-menu-items__menu-item bg-profile-card-certificate">
                            <div class="title">Сертификаты, курсы</div>
                            <a href="{{ route('cabinet.certifications') }}">Перейти</a>
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
                    @endif
                    <div class="profile-menu-items__menu-item bg-profile-card-megaphone">
                        <div class="title">Отзывы</div>
                        <a href="{{ route('cabinet.reviews') }}">Перейти</a>
                    </div>
                    @if(!\App\Services\SessionRoleService::isStudent())
                        <div class="profile-menu-items__menu-item bg-profile-card-calendar">
                            <div
                                class="title">{{ \App\Services\SessionRoleService::textByRole('Наставничество', 'Консультирование', 'Услуга не определен') }} </div>
                            <a href="{{ route('cabinet.mentoring') }}">Перейти</a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        @include('client.components.sectionWriteToUs', ['gray' => true])
    @endif
@endsection
