<div class="modal fade" id="registerPopup" tabindex="-1" role="dialog" aria-labelledby="registerPopup"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">
                <h2 class="modal-title">Регистрация</h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon close-icon">
                        <use xlink:href="{{asset('images/icon-close.svg#close-icon')}}"></use>
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
