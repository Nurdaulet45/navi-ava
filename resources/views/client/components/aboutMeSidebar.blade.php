<div class="about-me-sidebar">
    <div class="sidebar-menu-items">
        <div class="sidebar-menu-item @if(request()->routeIs('cabinet.aboutMe')) active @endif">
            <a href="{{ route('cabinet.aboutMe') }}"
               class="link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4ZM6 8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8C18 11.3137 15.3137 14 12 14C8.68629 14 6 11.3137 6 8ZM8 18C6.34315 18 5 19.3431 5 21C5 21.5523 4.55228 22 4 22C3.44772 22 3 21.5523 3 21C3 18.2386 5.23858 16 8 16H16C18.7614 16 21 18.2386 21 21C21 21.5523 20.5523 22 20 22C19.4477 22 19 21.5523 19 21C19 19.3431 17.6569 18 16 18H8Z"
                        fill="#707378"/>
                </svg>
                О себе
            </a>
            <div class="mini-profile-progressbar">
                <div class="profile-progressbar">
                    <div class="middle-circle"></div>
                    <div class="progress-spinner" style="background: conic-gradient(#6e8dfc {{$user->roleAboutProcent()}}%, #dde4ff {{$user->roleAboutProcent() + 10}}%);"></div>
                </div>
                <p class="progress-percent">{{$user->roleAboutProcent()}}%</p>
            </div>
        </div>
        <div class="sidebar-menu-item @if(request()->routeIs('cabinet.specialization')) active @endif">
            <a href="{{ route('cabinet.specialization') }}"
               class="link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4 6.6335C4.13986 6.57696 4.308 6.51452 4.50288 6.45153C5.19213 6.22874 6.21301 6 7.5 6C8.78699 6 9.80787 6.22874 10.4971 6.45153C10.692 6.51452 10.8601 6.57696 11 6.6335V17.5129C10.1488 17.2485 8.96016 17 7.5 17C6.03984 17 4.85122 17.2485 4 17.5129V6.6335ZM12 4.88528C11.7743 4.78519 11.4765 4.66622 11.1123 4.54847C10.2546 4.27126 9.02551 4 7.5 4C5.97449 4 4.74537 4.27126 3.88775 4.54847C3.45896 4.68707 3.12235 4.82736 2.88689 4.93656C2.76911 4.99119 2.67645 5.03812 2.61002 5.07329C2.5768 5.09089 2.55011 5.10555 2.5301 5.11679L2.5051 5.131L2.49638 5.13607L2.49297 5.13807L2.49151 5.13893C2.48954 5.1401 2.2451 5.28495 2.4902 5.13971C2.18633 5.31978 2 5.64679 2 6V19C2 19.3593 2.19275 19.691 2.50493 19.8689C2.8169 20.0466 3.20021 20.0435 3.50921 19.8606C3.50648 19.8622 3.50477 19.8632 3.50477 19.8632L3.50609 19.8625L3.50765 19.8616L3.50921 19.8606C3.51529 19.8572 3.52757 19.8505 3.54599 19.8408C3.58283 19.8213 3.64398 19.7901 3.72834 19.7509C3.89718 19.6726 4.15822 19.5629 4.50288 19.4515C5.19213 19.2287 6.21301 19 7.5 19C8.78699 19 9.80787 19.2287 10.4971 19.4515C10.8418 19.5629 11.1028 19.6726 11.2717 19.7509C11.356 19.7901 11.4172 19.8213 11.454 19.8408C11.4724 19.8505 11.4847 19.8573 11.4908 19.8608C11.4936 19.8623 11.4952 19.8632 11.4952 19.8632L12 4.88528ZM11.4952 19.8632L11.4939 19.8625L11.4924 19.8616L11.4908 19.8608C11.8048 20.0462 12.1954 20.0463 12.5092 19.8606C12.5153 19.8572 12.5276 19.8505 12.546 19.8408C12.5828 19.8213 12.644 19.7901 12.7283 19.7509C12.8972 19.6726 13.1582 19.5629 13.5029 19.4515C14.1921 19.2287 15.213 19 16.5 19C17.787 19 18.8079 19.2287 19.4971 19.4515C19.8418 19.5629 20.1028 19.6726 20.2717 19.7509C20.356 19.7901 20.4172 19.8213 20.454 19.8408C20.4724 19.8505 20.4847 19.8573 20.4908 19.8608L20.4919 19.8613C20.8007 20.0435 21.1835 20.0464 21.4951 19.8689C21.8072 19.691 22 19.3593 22 19V6C22 5.64679 21.8137 5.31978 21.5098 5.13971L21.5085 5.13893L21.507 5.13807L21.5036 5.13607L21.4949 5.131L21.4699 5.11679C21.4499 5.10555 21.4232 5.09089 21.39 5.07329C21.3236 5.03812 21.2309 4.99119 21.1131 4.93656C20.8776 4.82736 20.541 4.68707 20.1123 4.54847C19.2546 4.27126 18.0255 4 16.5 4C14.9745 4 13.7454 4.27126 12.8877 4.54847C12.5235 4.66622 12.2257 4.78519 12 4.88528L11.4952 19.8632ZM20 6.6335V17.5129C19.1488 17.2485 17.9602 17 16.5 17C15.0398 17 13.8512 17.2485 13 17.5129V6.6335C13.1399 6.57696 13.308 6.51452 13.5029 6.45153C14.1921 6.22874 15.213 6 16.5 6C17.787 6 18.8079 6.22874 19.4971 6.45153C19.692 6.51452 19.8601 6.57696 20 6.6335ZM20.4908 6.86075C20.4935 6.86228 20.4952 6.86325 20.4952 6.86325L20.4939 6.86248L20.4908 6.86075ZM20.4908 19.8608L20.4941 19.8626L20.4919 19.8613"
                        fill="#707378"/>
                </svg>
                Специализация
            </a>
            <div class="mini-profile-progressbar">
                <div class="profile-progressbar">
                    <div class="middle-circle"></div>
                    <div class="progress-spinner" style="background: conic-gradient(#6e8dfc {{$user->roleSpecializationsProcent()}}%, #dde4ff {{$user->roleSpecializationsProcent() + 10}}%);"></div>
                </div>
                <p class="progress-percent">{{ $user->roleSpecializationsProcent() }}%</p>
            </div>
        </div>
        <div class="sidebar-menu-item @if(request()->routeIs('cabinet.certifications')) active @endif">
            <a href="{{ route('cabinet.certifications') }}"
               class="link">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 11.0994V4.5C5.44772 4.5 5 4.05228 5 3.5C5 2.94772 5.44772 2.5 6 2.5H18C18.5523 2.5 19 2.94772 19 3.5C19 4.05228 18.5523 4.5 18 4.5V11.0994C18.9318 12.1201 19.4321 13.1341 19.6987 13.9338C19.8447 14.3719 19.9199 14.7435 19.9587 15.0148C19.9781 15.1506 19.9884 15.2615 19.9939 15.3436C19.9966 15.3847 19.9981 15.4186 19.999 15.4448L19.9996 15.4682L19.9998 15.4783L20 15.4907V15.4957V15.4979V15.499C20 15.499 19.9954 15.3677 20 15.5C20 16.0523 19.5523 16.5 19 16.5H13V21.5C13 22.0523 12.5523 22.5 12 22.5C11.4477 22.5 11 22.0523 11 21.5V16.5H5C4.44772 16.5 4 16.0523 4 15.5C4 15 4 15.499 4 15.499V15.4979L4.00001 15.4957L4.00004 15.4907L4.00019 15.4783C4.00033 15.4691 4.00059 15.4579 4.00101 15.4448C4.00185 15.4186 4.00338 15.3847 4.00612 15.3436C4.01159 15.2615 4.02191 15.1506 4.0413 15.0148C4.08006 14.7435 4.15528 14.3719 4.30132 13.9338C4.56788 13.1341 5.06824 12.1201 6 11.0994ZM16 4.5H8V11.5C8 11.7652 7.89464 12.0196 7.70711 12.2071C6.86009 13.0541 6.43577 13.8854 6.22128 14.5H17.7787C17.5642 13.8854 17.1399 13.0541 16.2929 12.2071C16.1054 12.0196 16 11.7652 16 11.5V4.5Z"
                        fill="#707378"/>
                </svg>
                Дипломы, сертификаты
            </a>
            <div class="mini-profile-progressbar">
                <div class="profile-progressbar">
                    <div class="middle-circle"></div>
                    <div class="progress-spinner" style="background: conic-gradient(#6e8dfc {{$user->roleCertificatesProcent()}}%, #dde4ff {{$user->roleCertificatesProcent() + 10}}%);"></div>
                </div>
                <p class="progress-percent">{{$user->roleCertificatesProcent()}}%</p>
            </div>
        </div>
        <div class="line"></div>
        <div class="sidebar-menu-item @if(request()->routeIs('cabinet.mentoring')) active @endif">
            <a href="{{ route('cabinet.mentoring') }}"
               class="link">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9 2.5C9.55228 2.5 10 2.94772 10 3.5V4.5H14V3.5C14 2.94772 14.4477 2.5 15 2.5C15.5523 2.5 16 2.94772 16 3.5V4.5H19C20.1046 4.5 21 5.39543 21 6.5V19.5C21 20.6046 20.1046 21.5 19 21.5H5C3.89543 21.5 3 20.6046 3 19.5V6.5C3 5.39543 3.89543 4.5 5 4.5H8V3.5C8 2.94772 8.44772 2.5 9 2.5ZM8 6.5H5V9.5H19V6.5H16V7.5C16 8.05228 15.5523 8.5 15 8.5C14.4477 8.5 14 8.05228 14 7.5V6.5H10V7.5C10 8.05228 9.55228 8.5 9 8.5C8.44772 8.5 8 8.05228 8 7.5V6.5ZM19 11.5H5V19.5H19V11.5Z"
                        fill="#707378"/>
                </svg>
                {{SessionRoleService::textByRole('Наставничества','Консультирование','Обучение','услуга не опеделен') }}
            </a>
        </div>

        <div class="sidebar-menu-item @if(request()->routeIs('cabinet.reviews')) active @endif">
            <a href="{{ route('cabinet.reviews') }}"
               class="link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.5019 2.13509C17.8102 2.31401 18 2.64353 18 3V7C19.1848 7 20.2502 7.51635 20.9812 8.33309C21.614 9.0401 22 9.97617 22 11C22 12.0238 21.614 12.9599 20.9812 13.6669C20.2502 14.4836 19.1848 15 18 15V19C18 19.3565 17.8102 19.686 17.5019 19.8649C17.1936 20.0438 16.8134 20.0451 16.5039 19.8682L10 16.1518V21C10 21.5523 9.55228 22 9 22H5C4.44772 22 4 21.5523 4 21V16C2.89543 16 2 15.1046 2 14V8C2 6.89543 2.89543 6 4 6H9.73444L16.5039 2.13176C16.8134 1.9549 17.1936 1.95617 17.5019 2.13509ZM10 14C10.174 14 10.345 14.0454 10.4961 14.1318L16 17.2768V4.72318L10.4961 7.86824C10.345 7.95458 10.174 8 10 8H4V14H10ZM6 16V20H8V16H6ZM18 13C18.5922 13 19.1233 12.7438 19.491 12.3331C19.8083 11.9786 20 11.5129 20 11C20 10.4871 19.8083 10.0214 19.491 9.66691C19.1233 9.25615 18.5922 9 18 9V13Z"
                        fill="#707378"/>
                </svg>
                Отзывы
            </a>
        </div>

    </div>
</div>
