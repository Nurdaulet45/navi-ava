

<div class="modal fade" id="editUserPasswordPopup" tabindex="-1" role="dialog" aria-labelledby="editUserPopup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">

                <h2 class="modal-title">{{ __('site.Change password') }}</h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon close-icon">
                        <use xlink:href="{{asset('images/close-icon.svg#close-icon')}}"></use>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.change_password') }}" id="changePasswordForm"
                      method="POST"
                      class="modal-form">
                    @csrf
                    <div class="form-input-block">
                        <input name="password" class="default-input modal-form-input"
                               id="edit-user-password"
                               type="password" placeholder="{{ __('site.Password') }}">
                        <span class="invalid-feedback" role="alert" id="error-editP-password"></span>
                    </div>
                    <div class="form-input-block">
                        <input name="password_confirmation" class="default-input modal-form-input"
                               id="edit-user-password_confirm"
                               type="password" placeholder="{{ __('site.Repeat the password') }}">
                        <span class="invalid-feedback" role="alert" id="error-editP-password_confirmation"></span>
                    </div>
                    <br>
                    <button type="submit" class="btn default-btn btn-editUser">
                        {{ __('site.Save') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

