<div class="modal fade" id="resetPasswordPopup" tabindex="-1" role="dialog" aria-labelledby="loginPopup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">

                <h2 class="modal-title">Восстановление пароля</h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon close-icon">
                        <use xlink:href="{{asset('images/icon-close.svg#close-icon')}}"></use>
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
