<div class="modal fade" id="loginPopup" tabindex="-1" role="dialog" aria-labelledby="loginPopup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">

                <h2 class="welcome-text">
                    Добро пожаловать
                    <br>
                    на NAVI-AVA.
                    <span class="info">Пожалуйста, введите e-mail или логин и пароль.</span>
                </h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon close-icon">
                        <use xlink:href="{{asset('images/icon-close.svg#close-icon')}}"></use>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm" class="modal-form" action=" route('login.ajax') }}">
                    @csrf

                    <div class="form-input-block">
                        <input id="login_phone" name="phone"
                               class="modal-form-input input-default w-100" type="text"
                               placeholder="Логин">
                        <span class="invalid-feedback" role="alert" id="error-login-phone"></span>
                    </div>
                    <div class="form-input-block">
                        <input id="login_password" name="password" class="modal-form-input input-default w-100"
                               type="password" placeholder="Пароль">
                        <span class="invalid-feedback" role="alert" id="error-login-password"></span>
                    </div>


                <div class="modal-desc-block">
                    <div class="checkbox">
                        <input class="default-checkbox-input" type="checkbox" id="color-1" name="color-2" value="red">
                        <label for="color-1">Запомнить на этом компьютере</label>
                    </div>
                    <a onclick="openResetPasswordLink(this)" class="desc-info-link">Забыли пароль?</a>
                </div>
                    <button class="btn-default-shadow medium-btn w-100">
                        Войти
                    </button>
                </form>
                <hr class="modal-hr">
                <div class="modal-desc-block justify-content-center">
                    <p class="desc-info"> Вы здесь впервые?</p>
                    <a onclick="openResetPasswordLink(this)" class="desc-info-link">Зарегистрироваться
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
