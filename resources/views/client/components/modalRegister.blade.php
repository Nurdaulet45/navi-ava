<div class="modal fade" id="registerPopup" tabindex="-1" role="dialog" aria-labelledby="registerPopup"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">
                <h2 class="modal-title">Регистрация</h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.93933 7.93933C8.52513 7.35356 9.47487 7.35356 10.0607 7.93933L18 15.8787L25.9393 7.93933C26.5251 7.35356 27.4749 7.35356 28.0606 7.93933C28.6464 8.52513 28.6464 9.47487 28.0606 10.0607L20.1213 18L28.0606 25.9393C28.6464 26.5251 28.6464 27.4749 28.0606 28.0606C27.4749 28.6464 26.5251 28.6464 25.9393 28.0606L18 20.1213L10.0607 28.0606C9.47487 28.6464 8.52513 28.6464 7.93933 28.0606C7.35356 27.4749 7.35356 26.5251 7.93933 25.9393L15.8787 18L7.93933 10.0607C7.35356 9.47487 7.35356 8.52513 7.93933 7.93933Z"
                            fill="#65676E"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                {{--                <div class="prev-register">--}}
                {{--                    <div class="nav nav-tabs register-tabs">--}}
                {{--                        <input type="radio" class="stv-radio-tab register-tab" name="register-user_type" value="mentor"--}}
                {{--                               id="tab_mentor"/>--}}
                {{--                        <label for="tab_mentor">Наставник</label>--}}
                {{--                        <input type="radio" class="stv-radio-tab register-tab" name="register-user_type" value="student"--}}
                {{--                               id="tab_student" checked/>--}}
                {{--                        <label for="tab_student">Ученик</label>--}}
                {{--                        <input type="radio" class="stv-radio-tab register-tab" name="register-user_type" value="consultant"--}}
                {{--                               id="tab_consultant"/>--}}
                {{--                        <label for="tab_consultant">Консультант</label>--}}
                {{--                    </div>--}}
                {{--                    <form id="prevRegisterForm" class="modal-form"  action="{{ route('check_email.ajax') }}">--}}
                {{--                        @csrf--}}
                {{--                        <div class="form-input-block">--}}
                {{--                            <input id="register-email" name="email"--}}
                {{--                                   class="modal-form-input input-default w-100" type="text"--}}
                {{--                                   required--}}
                {{--                                   placeholder="Email">--}}
                {{--                            <span class="invalid-feedback" role="alert" id="error-register-email"></span>--}}
                {{--                        </div>--}}
                {{--                        <button type="submit" class="btn-default-shadow medium-btn w-100">--}}
                {{--                            Далее--}}
                {{--                        </button>--}}
                {{--                    </form>--}}
                {{--                </div>--}}
                <div class="only-register">
                    <form id="registerForm" class="modal-form" action="{{ route('register.ajax') }}">
                        @csrf
                        <div class="form-input-block">
                            <input id="register-first_name" name="first_name"
                                   class="modal-form-input input-default w-100" type="text"
                                   placeholder="Имя" required>
                            <span class="invalid-feedback" role="alert" id="error-register-first_name"></span>
                        </div>
                        <div class="form-input-block">
                            <input id="register-last_name" name="last_name"
                                   class="modal-form-input input-default w-100" type="text"
                                   placeholder="Фамилия" required>
                            <span class="invalid-feedback" role="alert" id="error-register-last_name"></span>
                        </div>
                        <div class="form-input-block">
                            <input id="register-email" name="email"
                                   class="modal-form-input input-default w-100" type="text"
                                   required
                                   placeholder="Email">
                            <span class="invalid-feedback" role="alert" id="error-register-email"></span>
                        </div>
                        <div class="form-input-block">
                            <input id="register-phone" name="phone"
                                   class="modal-form-input input-default w-100" type="number"
                                   placeholder="Телефон" required>
                            <span class="invalid-feedback" role="alert" id="error-register-phone"></span>
                        </div>
                        <div class="form-input-block">
                            <select id="register-user_type" class="select modal-form-input input-default" name="user_type" required>
                                <option disabled>Выбрать</option>
                                <option value="student">Ученик</option>
                                <option value="mentor">Наставник</option>
                                <option value="paid_mentor">Платный наставник</option>
                                <option value="consultant">Консультант</option>
                                <option value="paid_consultant">Платный консультант</option>
                            </select>
                            <span class="invalid-feedback" role="alert" id="error-register-user_type"></span>
                        </div>
                        <div class="form-input-block">
                            <input id="register-password" name="password"
                                   class="modal-form-input input-default w-100" type="password"
                                   placeholder="Пароль" required>
                            <span class="invalid-feedback" role="alert" id="error-register-password"></span>
                        </div>
                        <div class="form-input-block">
                            <input id="register-password_confirmation" name="password_confirmation"
                                   class="modal-form-input input-default w-100" type="password"
                                   placeholder="Повторите пароль" required>
                            <span class="invalid-feedback" role="alert"
                                  id="error-register-password_confirmation"></span>
                        </div>
                        <span class="invalid-feedback" role="alert" id="error-register-password"></span>
                        <button type="submit" class="btn-default-shadow medium-btn w-100 btn-register">
                            Зарегистрироваться
                        </button>
                        <div class="modal-desc-block register-checkbox">
                            <div class="checkbox">
                                <input class="default-checkbox-input" type="checkbox" id="register-confirm_site_rules"
                                       name="confirm_site_rules">
                                <label for="register-confirm_site_rules">
                                    Нажимая на кнопку «Зарегистрироваться», я соглашаюсь с Правилами сайта и
                                    Пользовательской рассылкой
                                </label>
                            </div>
                        </div>
                        <span class="invalid-feedback mb-3" role="alert" id="error-register-confirm_site_rules"></span>
                        <div class="modal-desc-block register-checkbox">
                            <div class="checkbox">
                                <input class="default-checkbox-input" type="checkbox"
                                       id="register-confirm_privacy_policy"
                                       name="confirm_privacy_policy">
                                <label for="register-confirm_privacy_policy">
                                    Нажимая на кнопку «Зарегистрироваться»,я соглашаюсь c Пользовательским соглашением и
                                    Политикой конфиденциальности
                                </label>
                            </div>
                        </div>

                        <span class="invalid-feedback" role="alert" id="error-register-confirm_privacy_policy"></span>
                    </form>
                </div>
                <hr class="modal-hr">
                <div class="modal-desc-block justify-content-start">
                    <p class="desc-info">Уже есть аккаунт?</p>
                    <a onclick="openLoginLink()" class="desc-info-link">Войти
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>
