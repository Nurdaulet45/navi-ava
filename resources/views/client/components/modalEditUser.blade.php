<div class="modal fade" id="editUserPopup" tabindex="-1" role="dialog" aria-labelledby="editUserPopup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">

                <h2 class="modal-title">{{ __('site.Changing personal information') }}</h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon close-icon">
                        <use xlink:href="{{asset('images/close-icon.svg#close-icon')}}"></use>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" class="modal-form" action="{{ route('profile.update') }}">
                    @csrf
                    @method('POST')
                    <div class="form-input-block">
                        <input name="full_name" class="default-input modal-form-input"
                               id="edit-full_name"
                               {{--                       type="text" placeholder="Аты-жөніңіз" value="">--}}
                               type="text" placeholder="{{ __('site.Your name') }}" value="{{ $user->full_name }}">
                        <span class="invalid-feedback" role="alert" id="error-edit-full_name"></span>
                    </div>

                    {{--            <input name="user_id" type="hidden"  value="{{ $user->id }}">--}}

                    <div class="form-input-block">
                        <input name="email" class="default-input modal-form-input"
                               id="edit-email"
                               {{--                       type="email" placeholder="Email" value="">--}}
                               type="email" placeholder="Email" value="{{ $user->email }}">
                        <span class="invalid-feedback" role="alert" id="error-edit-email">
                </span>
                    </div>

                    <div class="form-input-block">
                        <input  name="phone_edit"
                                class="default-input modal-form-input" type="text"
                                id="edit-phone"
                                {{--                        placeholder="+7 (___) - ___ - __ - __" value="">--}}
                                placeholder="+7 (___) - ___ - __ - __" value="{{ $user->phone }}">
                        <span class="invalid-feedback" role="alert" id="error-edit-phone"></span>
                    </div>
                    <br>
                    <button type="submit" class="default-btn btn-editUser">
                        {{ __('site.Save') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
