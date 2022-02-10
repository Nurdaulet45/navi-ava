<div class="modal fade" id="registerPopup" tabindex="-1" role="dialog" aria-labelledby="registerPopup"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">
                <h2 class="modal-title">Регистрация</h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.93933 7.93933C8.52513 7.35356 9.47487 7.35356 10.0607 7.93933L18 15.8787L25.9393 7.93933C26.5251 7.35356 27.4749 7.35356 28.0606 7.93933C28.6464 8.52513 28.6464 9.47487 28.0606 10.0607L20.1213 18L28.0606 25.9393C28.6464 26.5251 28.6464 27.4749 28.0606 28.0606C27.4749 28.6464 26.5251 28.6464 25.9393 28.0606L18 20.1213L10.0607 28.0606C9.47487 28.6464 8.52513 28.6464 7.93933 28.0606C7.35356 27.4749 7.35356 26.5251 7.93933 25.9393L15.8787 18L7.93933 10.0607C7.35356 9.47487 7.35356 8.52513 7.93933 7.93933Z" fill="#65676E"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="prev-register">

                    <div class="nav nav-tabs register-tabs">
                        <a class="nav-link register-tab active" id="nav-mentor-tab" data-toggle="tab"
                           href="#nav-mentor" role="tab"
                           aria-controls="nav-mentor" aria-selected="true">
                            Наставник
                        </a>
                        <a class="nav-link register-tab" id="nav-child-tab" data-toggle="tab"
                           href="#nav-child" role="tab"
                           aria-controls="nav-child" aria-selected="false">
                            Ученик
                        </a>
                        <a class="nav-link register-tab" id="nav-consult-tab" data-toggle="tab"
                           href="#nav-consult" role="tab"
                           aria-controls="nav-consult" aria-selected="false">
                            Консультант
                        </a>
{{--                        <div class="register-tab active">--}}
{{--                            Наставник--}}
{{--                        </div>--}}
{{--                        <div class="register-tab">--}}
{{--                            Ученик--}}
{{--                        </div>--}}
{{--                        <div class="register-tab">--}}
{{--                            Консультант--}}
{{--                        </div>--}}
                    </div>
                    <form id="prevRegisterForm" class="modal-form" action=" route('login.ajax') }}">
                        @csrf
                        <div class="form-input-block">
                            <input id="register_email" name="email"
                                   class="modal-form-input input-default w-100" type="text"
                                   placeholder="Email">
                            <span class="invalid-feedback" role="alert" id="error-login-phone"></span>
                        </div>

                        <button type="button" class="btn-default-shadow medium-btn w-100" onclick="nextRegisterForm()">
                            Далее
                        </button>
                    </form>
                </div>
                <div class="only-register">
                    <form id="registerForm" class="modal-form" action=" route('login.ajax') }}">
                        @csrf
                        <div class="form-input-block">
                            <input id="login_phone" name="phone"
                                   class="modal-form-input input-default w-100" type="text"
                                   placeholder="Логин">
                            <span class="invalid-feedback" role="alert" id="error-login-phone"></span>
                        </div>
                        <div class="form-input-block">
                            <input id="login_phone" name="phone"
                                   class="modal-form-input input-default w-100" type="text"
                                   placeholder="Пароль">
                            <span class="invalid-feedback" role="alert" id="error-login-phone"></span>
                        </div>
                        <button type="submit" class="btn-default-shadow medium-btn w-100 btn-register">
                            Зарегистрироваться
                        </button>
                        <div class="modal-desc-block register-checkbox">
                            <div class="checkbox">
                                <input class="default-checkbox-input" type="checkbox" id="color-1" name="color-2" value="red">
                                <label for="color-1">Нажимая на кнопку «Зарегистрироваться», я соглашаюсь с Правилами сайта и Пользовательской рассылкой</label>
                            </div>
                        </div>
                        <div class="modal-desc-block register-checkbox">
                            <div class="checkbox">
                                <input class="default-checkbox-input" type="checkbox" id="color-1" name="color-2" value="red">
                                <label for="color-1">Нажимая на кнопку «Зарегистрироваться»,я соглашаюсь c Пользовательским соглашением и Политикой конфиденциальности</label>
                            </div>
                        </div>

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
