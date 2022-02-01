<header class="subheader">
    <div class="container">
        <div class="subheader-body">
            <div class="start">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" width="154" height="20" alt="{{ env('APP_NAME') }}">
                    <div class="text">Специалисты своего дела</div>
                </div>
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
                        <a href="ute('lang.switch', ['lang' => 'ru']) }}"
                           class="dropdown-item-custom {{ app()->getLocale() == 'ru' ?  'active' : '' }}">
                            {{ __('site.Russian') }}
                        </a>
                        <div class="line"></div>
                        <a href="ute('lang.switch', ['lang' => 'kk']) }}"
                           class="dropdown-item-custom {{ app()->getLocale() == 'kk' ?  'active' : '' }}">
                            {{ __('site.Kazakh') }}
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
                        <a href="ute('lang.switch', ['lang' => 'ru']) }}"
                           class="dropdown-item-custom {{ app()->getLocale() == 'ru' ?  'active' : '' }}">
                            {{ __('site.Russian') }}
                        </a>
                        <div class="line"></div>
                        <a href="ute('lang.switch', ['lang' => 'kk']) }}"
                           class="dropdown-item-custom {{ app()->getLocale() == 'kk' ?  'active' : '' }}">
                            {{ __('site.Kazakh') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="end">
                <div class="dropdown-menu dropdown-notification">
                    <span class="dropdown-body">
                        <span class="notification-badge">3</span>
                          <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.83712 1.78939C9.18385 0.935439 10.0216 0.333252 11 0.333252C11.9784 0.333252 12.8161 0.935439 13.1629 1.78939C16.6236 2.73743 19.1667 5.90501 19.1667 9.66659V15.1467L21.3041 18.3528C21.5427 18.7108 21.565 19.1711 21.362 19.5505C21.159 19.9298 20.7636 20.1666 20.3333 20.1666H15.042C14.7589 22.1454 13.0571 23.6666 11 23.6666C8.94293 23.6666 7.24107 22.1454 6.95802 20.1666H1.66667C1.23641 20.1666 0.841074 19.9298 0.63805 19.5505C0.435027 19.1711 0.457275 18.7108 0.69594 18.3528L2.83333 15.1467V9.66659C2.83333 5.90501 5.37647 2.73743 8.83712 1.78939ZM9.34963 20.1666C9.58985 20.8463 10.238 21.3333 11 21.3333C11.7619 21.3333 12.4102 20.8463 12.6504 20.1666H9.34963ZM11 3.83325C7.77834 3.83325 5.16667 6.44493 5.16667 9.66659V15.4999C5.16667 15.7302 5.09849 15.9554 4.97072 16.1471L3.84661 17.8333H18.1534L17.0293 16.1471C16.9015 15.9554 16.8333 15.7302 16.8333 15.4999V9.66659C16.8333 6.44493 14.2216 3.83325 11 3.83325Z" fill="#B7C0E1"/>
                          </svg>
                    </span>
                    <div class="dropdown-content dropdown-notification-content">
                        <a href="ute('lang.switch', ['lang' => 'ru']) }}"
                           class="dropdown-item-custom {{ app()->getLocale() == 'ru' ?  'active' : '' }}">
                            {{ __('site.Russian') }}
                        </a>
                        <div class="line"></div>
                        <a href="ute('lang.switch', ['lang' => 'kk']) }}"
                           class="dropdown-item-custom {{ app()->getLocale() == 'kk' ?  'active' : '' }}">
                            {{ __('site.Kazakh') }}
                        </a>
                    </div>
                </div>

                <div class="dropdown-menu dropdown-user">
                    <span class="dropdown-body">
                        <span class="user-info">
                            <span class="image">
                                <img src="{{ asset('images/user-icon.png') }}" width="36" height="36" alt="user-icon">
                            </span>
                            <span class="info">
                                <span class="name">
                                    Анастасия М
                                </span>
                                <span class="level">
                                    Наставник
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
                        <a href="ute('lang.switch', ['lang' => 'ru']) }}"
                           class="dropdown-item-custom {{ app()->getLocale() == 'ru' ?  'active' : '' }}">
                            {{ __('site.Russian') }}
                        </a>
                        <div class="line"></div>
                        <a href="ute('lang.switch', ['lang' => 'kk']) }}"
                           class="dropdown-item-custom {{ app()->getLocale() == 'kk' ?  'active' : '' }}">
                            {{ __('site.Kazakh') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="header">
    <div class="container">
        <div class="header-body">
            <div class="start">
                <div class="menu-items">
                    <a class="menu-item">
                        Наставники
                    </a>
                    <a class="menu-item">
                        Консультанты
                    </a>
                    <a class="menu-item">
                        Ученики
                    </a>
                </div>

            </div>
            <div class="end">
                <div class="menu-items">
                    <a class="menu-item">
                        О сервисе
                    </a>
                    <a class="menu-item">
                        Блог
                    </a>
                    <div class="menu-item dropdown-menu dropdown-cities">
                        <span class="dropdown-body">
                                Помощь
                                 <svg class="down-arrow" width="14" height="8" viewBox="0 0 14 8" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                    fill="#A5A7B0"/>
                            </svg>
                        </span>
                        <div class="dropdown-content dropdown-cities-content">
                            <a href="ute('lang.switch', ['lang' => 'ru']) }}"
                               class="dropdown-item-custom {{ app()->getLocale() == 'ru' ?  'active' : '' }}">
                                {{ __('site.Russian') }}
                            </a>
                            <div class="line"></div>
                            <a href="ute('lang.switch', ['lang' => 'kk']) }}"
                               class="dropdown-item-custom {{ app()->getLocale() == 'kk' ?  'active' : '' }}">
                                {{ __('site.Kazakh') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
