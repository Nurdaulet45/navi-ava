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
                                    <img src="{{  asset(auth()->user()->avatarImage)  }}" alt="user-icon">
                                </div>
                                <div class="user-info">
                                    <p class="name">
                                        {{$user->firstNameAndLetterLastNameCustom}}{{ ', ' . $user->login }}
                                    </p>
                                    <p class="city">
                                        {{ $user->countryAddressCustom }}
                                    </p>
                                    @if(!SessionRoleService::isStudent())
                                        <p class="work">
                                            {{ $user->specializationTextCustom }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="status-price-block @if(!$userInformation->user_status) status-bg-red @endif">
                                Статус
                                <div class="mentor">
                                    {{ SessionRoleService::roleName(Session::get('role')) }}
                                    <span class="status"></span>
                                    {{ SessionRoleService::textUserRoleStatus($userInformation->user_status) }}
                                </div>
                                @if(!SessionRoleService::isStudent() && !SessionRoleService::isMentor() && !SessionRoleService::isConsultant())
                                    <div class="price">
                                        {{ $userInformation->service_price ?  "$userInformation->service_price ₽ / час" : 'Бесплатная'}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="mentor-statistics">
                            <div class="mentor-statistic-item">
                                <div class="count">10</div>
                                <p>Отзывы</p>
                            </div>
                            <div class="mentor-statistic-item">
                                <div class="count">{{ $userInformation->visitedSum() }}</div>
                                <p>Открыл контактов</p>
                            </div>
                            <div class="mentor-statistic-item">
                                <div class="count">{{ $userInformation->visitedWeekSum() }}</div>
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
                            <p>Заполнено</p>
                            <div class="mini-profile-progressbar">
                                <div class="profile-progressbar">
                                    <div class="middle-circle"></div>
                                    <div class="progress-spinner"
                                         style="background: conic-gradient(#6e8dfc {{$userAboutProcent }}%, #dde4ff {{$userAboutProcent + 10}}%)"></div>
                                </div>
                                <p class="progress-percent">{{$userAboutProcent}}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-menu-items__menu-item bg-profile-card-spec">
                        <div class="title">Специализация</div>
                        <a href="{{ route('cabinet.specialization') }}">Перейти</a>
                        <div class="profile-menu-items__menu-item-counter">
                            <p>Заполнено</p>
                            <div class="mini-profile-progressbar">
                                <div class="profile-progressbar">
                                    <div class="middle-circle"></div>
                                    <div class="progress-spinner"
                                         style="background: conic-gradient(#6e8dfc {{$userSpecializationsProcent }}%, #dde4ff {{$userSpecializationsProcent + 10}}%)"></div>
                                </div>
                                <p class="progress-percent">{{ $userSpecializationsProcent }}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-menu-items__menu-item bg-profile-card-certificate">
                        <div class="title">Сертификаты, курсы</div>
                        <a href="{{ route('cabinet.certifications') }}">Перейти</a>
                        <div class="profile-menu-items__menu-item-counter">
                            <p>Заполнено</p>
                            <div class="mini-profile-progressbar">
                                <div class="profile-progressbar">
                                    <div class="middle-circle"></div>
                                    <div class="progress-spinner"
                                         style="background: conic-gradient(#6e8dfc {{$userCertificatesProcent }}%, #dde4ff {{$userCertificatesProcent + 10}}%)"></div>
                                </div>
                                <p class="progress-percent">{{ $userCertificatesProcent }}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-menu-items__menu-item bg-profile-card-megaphone">
                        <div class="title">Отзывы</div>
                        <a href="{{ route('cabinet.reviews') }}">Перейти</a>
                    </div>

                    <div class="profile-menu-items__menu-item bg-profile-card-calendar">
                        <div
                            class="title">{{ SessionRoleService::textByRole('Статус','Статус' ,'Статус') }} </div>
                        <a href="{{ route('cabinet.mentoring') }}">Перейти</a>
                    </div>

                </div>
            </div>
        </section>
        @include('client.components.sectionWriteToUs', ['gray' => true])
    @endif
@endsection
