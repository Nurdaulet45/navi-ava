<div class="modal fade" id="resetPasswordPopup" tabindex="-1" role="dialog" aria-labelledby="loginPopup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">

                <h2 class="modal-title">Восстановление пароля</h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.93933 7.93933C8.52513 7.35356 9.47487 7.35356 10.0607 7.93933L18 15.8787L25.9393 7.93933C26.5251 7.35356 27.4749 7.35356 28.0606 7.93933C28.6464 8.52513 28.6464 9.47487 28.0606 10.0607L20.1213 18L28.0606 25.9393C28.6464 26.5251 28.6464 27.4749 28.0606 28.0606C27.4749 28.6464 26.5251 28.6464 25.9393 28.0606L18 20.1213L10.0607 28.0606C9.47487 28.6464 8.52513 28.6464 7.93933 28.0606C7.35356 27.4749 7.35356 26.5251 7.93933 25.9393L15.8787 18L7.93933 10.0607C7.35356 9.47487 7.35356 8.52513 7.93933 7.93933Z" fill="#65676E"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="resetPasswordForm" class="modal-form" action="route('reset_password.ajax') }}">
                    @csrf

                    <div class="form-input-block">
                        <input id="reset_password_email" name="email"
                               class="modal-form-input input-default w-100" type="email"
                               placeholder="example@example.com">
                        <span class="invalid-feedback" role="alert" id="error-reset_password-email"></span>
                    </div>

                    <button type="submit" class="btn-default medium-btn w-100">
                        Восстановить пароль
                    </button>
                </form>
                <hr class="modal-hr">

                <button class="btn-white-green medium-btn w-100 btn-register" onclick="openRegisterLink(this)">
                    Регистрация
                </button>
            </div>

        </div>
    </div>
</div>
