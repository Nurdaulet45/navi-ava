<div class="modal fade" id="whoLookingPopup" tabindex="-1" role="dialog" aria-labelledby="whoLookingPopup"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content inner-modal">
            <div class="modal-header">
                <h2 class="modal-title">Кого именно вы ищете?</h2>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.93933 7.93933C8.52513 7.35356 9.47487 7.35356 10.0607 7.93933L18 15.8787L25.9393 7.93933C26.5251 7.35356 27.4749 7.35356 28.0606 7.93933C28.6464 8.52513 28.6464 9.47487 28.0606 10.0607L20.1213 18L28.0606 25.9393C28.6464 26.5251 28.6464 27.4749 28.0606 28.0606C27.4749 28.6464 26.5251 28.6464 25.9393 28.0606L18 20.1213L10.0607 28.0606C9.47487 28.6464 8.52513 28.6464 7.93933 28.0606C7.35356 27.4749 7.35356 26.5251 7.93933 25.9393L15.8787 18L7.93933 10.0607C7.35356 9.47487 7.35356 8.52513 7.93933 7.93933Z"
                            fill="#65676E"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="prev-register">
                    <form action="{{ route('mentor') }}" >

                    <div class="nav nav-tabs register-tabs">
                        <input type="radio" class="stv-radio-tab register-tab" name="search-user_type" value="mentor"
                               id="tab_mentor"/>
                        <label for="tab_mentor">Наставника</label>
                        <input type="radio" class="stv-radio-tab register-tab" name="search-user_type" value="consultant"
                               id="tab_consultant"/>
                        <label for="tab_consultant">Консультанта</label>
                        <input type="radio" class="stv-radio-tab register-tab" name="search-user_type" value="student"
                               id="tab_student" checked/>
                        <label for="tab_student">Ученика</label>

                    </div>
                    <button type="submit" class="btn-default-shadow medium-btn w-100">
                        Найти
                    </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
