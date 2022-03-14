<header class="subheader">
    <div class="container">
        <div class="subheader-body">
            <div class="start">
                <a href="{{ route('index') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" width="154" height="20" alt="{{ env('APP_NAME') }}">
                    <div class="text">Начни создавать историю</div>
                </a>
                <div class="dropdown-menu dropdown-cities">
                    <span class="dropdown-body">
                            <div class="text">Алматы</div>
                            <svg class="down-arrow" width="14" height="8" viewBox="0 0 14 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                    fill="#A5A7B0"/>
                            </svg>
                    </span>
                    <div class="dropdown-content dropdown-cities-content">
                        <a href="#"
                           class="dropdown-item-custom">
                            Алматы
                        </a>
                        <a href="#"
                           class="dropdown-item-custom {{ app()->getLocale() == 'kk' ?  'active' : '' }}">
                            Шымкент
                        </a>
                        <a href="#"
                           class="dropdown-item-custom {{ app()->getLocale() == 'kk' ?  'active' : '' }}">
                            Нур-Султан
                        </a>
                    </div>
                </div>
            </div>
            <div class="center">
                <form>
                    <input type="text" placeholder="Поиск по сайту" class="search-input">
                </form>

                <div class="dropdown-menu dropdown-lang">
                    <span class="dropdown-body">
                           <span class="text upper-case">Ru
                            <svg class="lang-icon" width="20" height="21" viewBox="0 0 20 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 8.31609H0V4.29309C0 4.10266 0.154414 3.94824 0.344843 3.94824H19.6552C19.8456 3.94824 20 4.10266 20 4.29309L20 8.31609Z"
                                fill="#F5F5F5"/>
                            <path
                                d="M19.6551 17.0519H0.344843C0.154414 17.0519 0 16.8975 0 16.707V12.6841H20V16.707C20 16.8975 19.8455 17.0519 19.6551 17.0519Z"
                                fill="#FF4B55"/>
                            <path d="M20 8.31592H0V12.6835H20V8.31592Z" fill="#41479B"/>
                            </svg>
                           </span>
                             <svg class="down-arrow" width="14" height="8" viewBox="0 0 14 8" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                    fill="#A5A7B0"/>
                            </svg>
                    </span>
                    <div class="dropdown-content dropdown-lang-content">
                        <a href="#"
                           class="dropdown-item-custom active">
                            <img src="{{ asset('images/ru-icon.png') }}" alt="ru">
                            RU
                        </a>
                        <div class="line"></div>
                        <a href="#"
                           class="dropdown-item-custom">
                            <img src="{{ asset('images/kz-icon.png') }}" alt="kk">
                            KZ
                        </a>
                        {{--                        <div class="line"></div>--}}
                        {{--                        <a href="#"--}}
                        {{--                           class="dropdown-item-custom">--}}
                        {{--                            <img src="{{ asset('images/en-icon.png') }}" alt="kk">--}}
                        {{--                            EN--}}
                        {{--                        </a>--}}
                    </div>
                </div>
            </div>
            <div class="end">
                <div class="dropdown-menu dropdown-notification">
                    <span class="dropdown-body">
                        <span class="notification-badge">3</span>
                          <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.83712 1.78939C9.18385 0.935439 10.0216 0.333252 11 0.333252C11.9784 0.333252 12.8161 0.935439 13.1629 1.78939C16.6236 2.73743 19.1667 5.90501 19.1667 9.66659V15.1467L21.3041 18.3528C21.5427 18.7108 21.565 19.1711 21.362 19.5505C21.159 19.9298 20.7636 20.1666 20.3333 20.1666H15.042C14.7589 22.1454 13.0571 23.6666 11 23.6666C8.94293 23.6666 7.24107 22.1454 6.95802 20.1666H1.66667C1.23641 20.1666 0.841074 19.9298 0.63805 19.5505C0.435027 19.1711 0.457275 18.7108 0.69594 18.3528L2.83333 15.1467V9.66659C2.83333 5.90501 5.37647 2.73743 8.83712 1.78939ZM9.34963 20.1666C9.58985 20.8463 10.238 21.3333 11 21.3333C11.7619 21.3333 12.4102 20.8463 12.6504 20.1666H9.34963ZM11 3.83325C7.77834 3.83325 5.16667 6.44493 5.16667 9.66659V15.4999C5.16667 15.7302 5.09849 15.9554 4.97072 16.1471L3.84661 17.8333H18.1534L17.0293 16.1471C16.9015 15.9554 16.8333 15.7302 16.8333 15.4999V9.66659C16.8333 6.44493 14.2216 3.83325 11 3.83325Z"
                                fill="#B7C0E1"/>
                          </svg>
                    </span>
                    <div class="dropdown-content dropdown-notification-content">
                        <a href="#"
                           class="dropdown-item-custom">
                            У вас 3 непрочитанных сообщений
                        </a>
{{--                        <div class="line"></div>--}}
{{--                        <a href="#"--}}
{{--                           class="dropdown-item-custom {{ app()->getLocale() == 'kk' ?  'active' : '' }}">--}}
{{--                            Найден 250 подходящих менторов--}}
{{--                        </a>--}}
                    </div>
                </div>


                @auth
                    <div class="dropdown-menu dropdown-user">
                    <span class="dropdown-body">
                        <span class="user-info">
                            <span class="image @if(auth()->user()->avatar) b-none @endif">
                                <img
                                    src="{{ auth()->user()->avatarImage  }}"
                                    width="36" height="36"
                                    alt="avatar">
                            </span>
                            <span class="info">
                                <span class="name">
                                   {{auth()->user()->firstNameAndLetterLastNameCustom}}
                                </span>
                                <span class="level">
                                    {{ SessionRoleService::getSessionRoleName() }}
                                </span>
                            </span>
                        </span>
                          <svg class="down-arrow" width="14" height="8" viewBox="0 0 14 8" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                    fill="#A5A7B0"/>
                            </svg>
                    </span>
                        <div class="dropdown-content dropdown-user-content">
                            <a href="{{ route('cabinet') }}"
                               class="dropdown-item-custom @if(request()->routeIs('cabinet')) active @endif ">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4ZM6 8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8C18 11.3137 15.3137 14 12 14C8.68629 14 6 11.3137 6 8ZM8 18C6.34315 18 5 19.3431 5 21C5 21.5523 4.55228 22 4 22C3.44772 22 3 21.5523 3 21C3 18.2386 5.23858 16 8 16H16C18.7614 16 21 18.2386 21 21C21 21.5523 20.5523 22 20 22C19.4477 22 19 21.5523 19 21C19 19.3431 17.6569 18 16 18H8Z"
                                        fill="#707378"/>
                                </svg>
                                Мой кабинет
                            </a>
                            <a href="{{ route('cabinet.specialization') }}"
                               class="dropdown-item-custom @if(request()->routeIs('cabinet.specialization')) active @endif ">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 6.6335C4.13986 6.57696 4.308 6.51452 4.50288 6.45153C5.19213 6.22874 6.21301 6 7.5 6C8.78699 6 9.80787 6.22874 10.4971 6.45153C10.692 6.51452 10.8601 6.57696 11 6.6335V17.5129C10.1488 17.2485 8.96016 17 7.5 17C6.03984 17 4.85122 17.2485 4 17.5129V6.6335ZM12 4.88528C11.7743 4.78519 11.4765 4.66622 11.1123 4.54847C10.2546 4.27126 9.02551 4 7.5 4C5.97449 4 4.74537 4.27126 3.88775 4.54847C3.45896 4.68707 3.12235 4.82736 2.88689 4.93656C2.76911 4.99119 2.67645 5.03812 2.61002 5.07329C2.5768 5.09089 2.55011 5.10555 2.5301 5.11679L2.5051 5.131L2.49638 5.13607L2.49297 5.13807L2.49151 5.13893C2.48954 5.1401 2.2451 5.28495 2.4902 5.13971C2.18633 5.31978 2 5.64679 2 6V19C2 19.3593 2.19275 19.691 2.50493 19.8689C2.8169 20.0466 3.20021 20.0435 3.50921 19.8606C3.50648 19.8622 3.50477 19.8632 3.50477 19.8632L3.50609 19.8625L3.50765 19.8616L3.50921 19.8606C3.51529 19.8572 3.52757 19.8505 3.54599 19.8408C3.58283 19.8213 3.64398 19.7901 3.72834 19.7509C3.89718 19.6726 4.15822 19.5629 4.50288 19.4515C5.19213 19.2287 6.21301 19 7.5 19C8.78699 19 9.80787 19.2287 10.4971 19.4515C10.8418 19.5629 11.1028 19.6726 11.2717 19.7509C11.356 19.7901 11.4172 19.8213 11.454 19.8408C11.4724 19.8505 11.4847 19.8573 11.4908 19.8608C11.4936 19.8623 11.4952 19.8632 11.4952 19.8632L12 4.88528ZM11.4952 19.8632L11.4939 19.8625L11.4924 19.8616L11.4908 19.8608C11.8048 20.0462 12.1954 20.0463 12.5092 19.8606C12.5153 19.8572 12.5276 19.8505 12.546 19.8408C12.5828 19.8213 12.644 19.7901 12.7283 19.7509C12.8972 19.6726 13.1582 19.5629 13.5029 19.4515C14.1921 19.2287 15.213 19 16.5 19C17.787 19 18.8079 19.2287 19.4971 19.4515C19.8418 19.5629 20.1028 19.6726 20.2717 19.7509C20.356 19.7901 20.4172 19.8213 20.454 19.8408C20.4724 19.8505 20.4847 19.8573 20.4908 19.8608L20.4919 19.8613C20.8007 20.0435 21.1835 20.0464 21.4951 19.8689C21.8072 19.691 22 19.3593 22 19V6C22 5.64679 21.8137 5.31978 21.5098 5.13971L21.5085 5.13893L21.507 5.13807L21.5036 5.13607L21.4949 5.131L21.4699 5.11679C21.4499 5.10555 21.4232 5.09089 21.39 5.07329C21.3236 5.03812 21.2309 4.99119 21.1131 4.93656C20.8776 4.82736 20.541 4.68707 20.1123 4.54847C19.2546 4.27126 18.0255 4 16.5 4C14.9745 4 13.7454 4.27126 12.8877 4.54847C12.5235 4.66622 12.2257 4.78519 12 4.88528L11.4952 19.8632ZM20 6.6335V17.5129C19.1488 17.2485 17.9602 17 16.5 17C15.0398 17 13.8512 17.2485 13 17.5129V6.6335C13.1399 6.57696 13.308 6.51452 13.5029 6.45153C14.1921 6.22874 15.213 6 16.5 6C17.787 6 18.8079 6.22874 19.4971 6.45153C19.692 6.51452 19.8601 6.57696 20 6.6335ZM20.4908 6.86075C20.4935 6.86228 20.4952 6.86325 20.4952 6.86325L20.4939 6.86248L20.4908 6.86075ZM20.4908 19.8608L20.4941 19.8626L20.4919 19.8613"
                                        fill="#707378"/>
                                </svg>
                                Специализация
                            </a>
                            @if(SessionRoleService::isStudent())
                                <a href="{{ route('cabinet.certifications') }}"
                                   class="dropdown-item-custom @if(request()->routeIs('cabinet.certifications')) active @endif ">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10.5994V4C5.44772 4 5 3.55228 5 3C5 2.44772 5.44772 2 6 2H18C18.5523 2 19 2.44772 19 3C19 3.55228 18.5523 4 18 4V10.5994C18.9318 11.6201 19.4321 12.6341 19.6987 13.4338C19.8447 13.8719 19.9199 14.2435 19.9587 14.5148C19.9781 14.6506 19.9884 14.7615 19.9939 14.8436C19.9966 14.8847 19.9981 14.9186 19.999 14.9448L19.9996 14.9682L19.9998 14.9783L20 14.9907V14.9957V14.9979V14.999C20 14.999 19.9954 14.8677 20 15C20 15.5523 19.5523 16 19 16H13V21C13 21.5523 12.5523 22 12 22C11.4477 22 11 21.5523 11 21V16H5C4.44772 16 4 15.5523 4 15C4 14.5 4 14.999 4 14.999V14.9979L4.00001 14.9957L4.00004 14.9907L4.00019 14.9783C4.00033 14.9691 4.00059 14.9579 4.00101 14.9448C4.00185 14.9186 4.00338 14.8847 4.00612 14.8436C4.01159 14.7615 4.02191 14.6506 4.0413 14.5148C4.08006 14.2435 4.15528 13.8719 4.30132 13.4338C4.56788 12.6341 5.06824 11.6201 6 10.5994ZM16 4H8V11C8 11.2652 7.89464 11.5196 7.70711 11.7071C6.86009 12.5541 6.43577 13.3854 6.22128 14H17.7787C17.5642 13.3854 17.1399 12.5541 16.2929 11.7071C16.1054 11.5196 16 11.2652 16 11V4Z"
                                            fill="#707378"/>
                                    </svg>
                                    Сертификаты, курсы
                                </a>
                            @endif
                            <a href="{{ route('cabinet.reviews') }}"
                               class="dropdown-item-custom @if(request()->routeIs('cabinet.reviews')) active @endif ">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.5019 2.13509C17.8102 2.31401 18 2.64353 18 3V7C19.1848 7 20.2502 7.51635 20.9812 8.33309C21.614 9.0401 22 9.97617 22 11C22 12.0238 21.614 12.9599 20.9812 13.6669C20.2502 14.4836 19.1848 15 18 15V19C18 19.3565 17.8102 19.686 17.5019 19.8649C17.1936 20.0438 16.8134 20.0451 16.5039 19.8682L10 16.1518V21C10 21.5523 9.55228 22 9 22H5C4.44772 22 4 21.5523 4 21V16C2.89543 16 2 15.1046 2 14V8C2 6.89543 2.89543 6 4 6H9.73444L16.5039 2.13176C16.8134 1.9549 17.1936 1.95617 17.5019 2.13509ZM10 14C10.174 14 10.345 14.0454 10.4961 14.1318L16 17.2768V4.72318L10.4961 7.86824C10.345 7.95458 10.174 8 10 8H4V14H10ZM6 16V20H8V16H6ZM18 13C18.5922 13 19.1233 12.7438 19.491 12.3331C19.8083 11.9786 20 11.5129 20 11C20 10.4871 19.8083 10.0214 19.491 9.66691C19.1233 9.25615 18.5922 9 18 9V13Z"
                                        fill="#707378"/>
                                </svg>
                                Отзывы
                            </a>
                            <a href="{{ route('cabinet.favorites') }}"
                               class="dropdown-item-custom @if(request()->routeIs('cabinet.favorites')) active @endif ">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 4.52765C9.64418 2.41689 6.02125 2.49347 3.75736 4.75736C1.41421 7.10051 1.41421 10.8995 3.75736 13.2426L10.5858 20.0711C11.3668 20.8521 12.6332 20.8521 13.4142 20.0711L20.2426 13.2426C22.5858 10.8995 22.5858 7.10051 20.2426 4.75736C17.9787 2.49347 14.3558 2.41689 12 4.52765ZM10.8284 6.17157L11.2929 6.63604C11.6834 7.02656 12.3166 7.02656 12.7071 6.63604L13.1716 6.17157C14.7337 4.60948 17.2663 4.60948 18.8284 6.17157C20.3905 7.73367 20.3905 10.2663 18.8284 11.8284L12 18.6569L5.17157 11.8284C3.60948 10.2663 3.60948 7.73367 5.17157 6.17157C6.73367 4.60948 9.26633 4.60948 10.8284 6.17157Z"
                                        fill="#707378"/>
                                </svg>
                                Избранное
                            </a>
                            <a onclick="javascript:void(0)"
                               class="dropdown-item-custom">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 6C2 4.89543 2.89543 4 4 4H20C21.1046 4 22 4.89543 22 6V17C22 18.1046 21.1046 19 20 19H15.4142L12.7071 21.7071C12.3166 22.0976 11.6834 22.0976 11.2929 21.7071L8.58579 19H4C2.89543 19 2 18.1046 2 17V6ZM20 6H4V17H9C9.26522 17 9.51957 17.1054 9.70711 17.2929L12 19.5858L14.2929 17.2929C14.4804 17.1054 14.7348 17 15 17H20V6ZM6 9.5C6 8.94772 6.44772 8.5 7 8.5H17C17.5523 8.5 18 8.94772 18 9.5C18 10.0523 17.5523 10.5 17 10.5H7C6.44772 10.5 6 10.0523 6 9.5ZM6 13.5C6 12.9477 6.44772 12.5 7 12.5H13C13.5523 12.5 14 12.9477 14 13.5C14 14.0523 13.5523 14.5 13 14.5H7C6.44772 14.5 6 14.0523 6 13.5Z"
                                        fill="#707378"/>
                                </svg>
                                Чат
                            </a>
                            <a href="{{ route('cabinet.changeMail') }}"
                               class="dropdown-item-custom @if(request()->routeIs('cabinet.changeMail')) active @endif ">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 5C8.44772 5 8 5.44772 8 6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 9.55228 5 9 5ZM6.17071 5C6.58254 3.83481 7.69378 3 9 3C10.3062 3 11.4175 3.83481 11.8293 5H19C19.5523 5 20 5.44772 20 6C20 6.55228 19.5523 7 19 7H11.8293C11.4175 8.16519 10.3062 9 9 9C7.69378 9 6.58254 8.16519 6.17071 7H5C4.44772 7 4 6.55228 4 6C4 5.44772 4.44772 5 5 5H6.17071ZM15 11C14.4477 11 14 11.4477 14 12C14 12.5523 14.4477 13 15 13C15.5523 13 16 12.5523 16 12C16 11.4477 15.5523 11 15 11ZM12.1707 11C12.5825 9.83481 13.6938 9 15 9C16.3062 9 17.4175 9.83481 17.8293 11H19C19.5523 11 20 11.4477 20 12C20 12.5523 19.5523 13 19 13H17.8293C17.4175 14.1652 16.3062 15 15 15C13.6938 15 12.5825 14.1652 12.1707 13H5C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11H12.1707ZM9 17C8.44772 17 8 17.4477 8 18C8 18.5523 8.44772 19 9 19C9.55228 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17ZM6.17071 17C6.58254 15.8348 7.69378 15 9 15C10.3062 15 11.4175 15.8348 11.8293 17H19C19.5523 17 20 17.4477 20 18C20 18.5523 19.5523 19 19 19H11.8293C11.4175 20.1652 10.3062 21 9 21C7.69378 21 6.58254 20.1652 6.17071 19H5C4.44772 19 4 18.5523 4 18C4 17.4477 4.44772 17 5 17H6.17071Z"
                                        fill="#707378"/>
                                </svg>
                                Настройки
                            </a>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="dropdown-item-custom p-0" type="submit">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M11 20C11 19.4477 10.5523 19 10 19H5V5H10C10.5523 5 11 4.55228 11 4C11 3.44771 10.5523 3 10 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H10C10.5523 21 11 20.5523 11 20Z"
                                              fill="#707378"/>
                                        <path
                                            d="M21.7136 12.7005C21.8063 12.6062 21.8764 12.498 21.9241 12.3828C21.9727 12.2657 21.9996 12.1375 22 12.003V12V11.997C21.9992 11.7421 21.9016 11.4874 21.7071 11.2929L17.7071 7.29289C17.3166 6.90237 16.6834 6.90237 16.2929 7.29289C15.9024 7.68342 15.9024 8.31658 16.2929 8.70711L18.5858 11H9C8.44771 11 8 11.4477 8 12C8 12.5523 8.44771 13 9 13H18.5858L16.2929 15.2929C15.9024 15.6834 15.9024 16.3166 16.2929 16.7071C16.6834 17.0976 17.3166 17.0976 17.7071 16.7071L21.7064 12.7078L21.7136 12.7005Z"
                                            fill="#65676E"/>
                                    </svg>
                                    Выйти
                                </button>
                            </form>
                            @foreach(auth()->user()->getRoleNames() as $role)
                                @if(in_array($role, Role::DEFAULT_ROLES))
                                    <div class="line"></div>
                                    @if(SessionRoleService::isSessionHasRole($role))
                                        <span class="user-info active-user">
                                             <span class="image @if(auth()->user()->avatar) b-none @endif">
                                                <img src="{{ asset(auth()->user()->avatarImage) }}" width="36"
                                                     height="36"
                                                     alt="user-icon">
                                            </span>
                                            <span class="info">
                                                <span class="name">
                                                   Вы вошли как {{  mb_strtolower(SessionRoleService::roleName($role)) }}
                                                </span>
                                                <span class="level">
                                               {{ auth()->user()->firstNameAndLetterLastNameCustom }}
                                                </span>
                                            </span>
                                        </span>
                                    @else
                                        <a class="user-info"
                                           href="{{ route('cabinet.sessionLoginAs', ['role' => $role]) }}">
                                             <span class="image @if(auth()->user()->avatar) b-none @endif">
                                                <img src="{{ asset(auth()->user()->avatarImage) }}" width="36"
                                                     height="36"
                                                     alt="user-icon">
                                            </span>
                                            <span class="info">
                                                <span class="name">
                                                        Войти как {{  mb_strtolower(SessionRoleService::roleName($role)) }}
                                                </span>
                                                <span class="level">
                                               {{ auth()->user()->firstNameAndLetterLastNameCustom }}
                                                </span>
                                            </span>
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <button class=" btn-default small-btn btn-text-normal" onclick="openLoginLink()">
                        Войти
                    </button>
                @endauth
            </div>
        </div>
    </div>
</header>
<header class="header">
    <div class="container">
        <div class="header-body">
            <div class="start">
                <div class="menu-items">
                    <a href="{{ route('mentors.index') }}" class="menu-item @if(request()->routeIs('mentors.*')) menu-item-active @endif">
                        Наставники
                    </a>
                    <a href="{{ route('consultants.index') }}" class="menu-item @if(request()->routeIs('consultants.*')) menu-item-active @endif">
                        Консультанты
                    </a>
                    <a href="{{ route('students.index') }}" class="menu-item @if(request()->routeIs('students.*')) menu-item-active @endif">
                        Ученики
                    </a>
                </div>

            </div>
            <div class="end">
                <div class="menu-items">
                    <a href="{{ route('aboutService') }}"
                       class="menu-item @if(request()->routeIs('aboutService')) active @endif ">
                        О сервисе
                    </a>
                    <a href="{{ route('blog') }}"
                       class="menu-item @if(request()->routeIs('blog.*')) active @endif ">
                        Блог
                    </a>
                    <div class="menu-item dropdown-menu dropdown-help">
                        <span class="dropdown-body">
                                Помощь
                                 <svg class="down-arrow" width="14" height="8" viewBox="0 0 14 8" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                        fill="#A5A7B0"/>
                                </svg>
                        </span>
                        <div class="dropdown-content dropdown-help-content">
                            <a href="{{ route('support') }}"
                               class="dropdown-item-not-icon @if(request()->routeIs('support')) active @endif ">
                                Служба поддержки
                            </a>
                            <div class="line"></div>
                            <a href="{{ route('serviceRules') }}"
                               class="dropdown-item-not-icon @if(request()->routeIs('serviceRules')) active @endif ">
                                Правила сервиса
                            </a>
                            <div class="line"></div>
                            <a href="{{ route('termsUse') }}"
                               class="dropdown-item-not-icon @if(request()->routeIs('termsUse')) active @endif ">
                                Пользовательское соглашение
                            </a>
                            <div class="line"></div>
                            <a href="{{ route('privacyPolicy') }}"
                               class="dropdown-item-not-icon @if(request()->routeIs('privacyPolicy')) active @endif ">
                                Политика конфиденциальности
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
