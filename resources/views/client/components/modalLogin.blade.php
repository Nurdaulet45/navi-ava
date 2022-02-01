<div class="modal fade" id="loginPopup" tabindex="-1" role="dialog" aria-labelledby="loginPopup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">

                <h2 class="modal-title">{{ __('site.Login to your account') }}</h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon close-icon">
                        <use xlink:href="{{asset('images/close-icon.svg#close-icon')}}"></use>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm" class="modal-form" action="{{ route('login.ajax') }}">
                    @csrf

                    <div class="form-input-block">
                        <input id="login_phone" name="phone"
                               class="default-input modal-form-input" type="text"
                               placeholder="+7 (700)-999-99-99">
                        <span class="invalid-feedback" role="alert" id="error-login-phone"></span>
                    </div>
                    <div class="form-input-block">
                        <input id="login_password" name="password" class="default-input modal-form-input"
                               type="password" placeholder="{{ __('site.Password') }}">
                        <span class="invalid-feedback" role="alert" id="error-login-password"></span>
                    </div>

                    <button type="submit" class="default-btn button-login">
                        {{__('site.Login')}}
                    </button>
                </form>

                <div class="modal-desc-block">
                    <p class="desc-info">{{ __('site.Forgot your password') }}</p>
                    <a onclick="openResetPasswordLink(this)" class="desc-info-link">{{ __('site.Restore password') }}</a>
                </div>

                <hr class="modal-hr">

                <div class="white-btn btn-register" onclick="openRegisterLink(this)">
                    {{__('site.Sign up')}}
                </div>
            </div>
        </div>
    </div>
</div>
