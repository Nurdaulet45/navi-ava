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
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.93933 7.93933C8.52513 7.35356 9.47487 7.35356 10.0607 7.93933L18 15.8787L25.9393 7.93933C26.5251 7.35356 27.4749 7.35356 28.0606 7.93933C28.6464 8.52513 28.6464 9.47487 28.0606 10.0607L20.1213 18L28.0606 25.9393C28.6464 26.5251 28.6464 27.4749 28.0606 28.0606C27.4749 28.6464 26.5251 28.6464 25.9393 28.0606L18 20.1213L10.0607 28.0606C9.47487 28.6464 8.52513 28.6464 7.93933 28.0606C7.35356 27.4749 7.35356 26.5251 7.93933 25.9393L15.8787 18L7.93933 10.0607C7.35356 9.47487 7.35356 8.52513 7.93933 7.93933Z" fill="#65676E"/>
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
