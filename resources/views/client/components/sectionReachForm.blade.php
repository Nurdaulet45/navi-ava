<section class="reach">
    <div class="container">
        <div class="reach-block">
            <div class="reach-left">
                <div class="title">
                    {{ __('site.Leave a request') }}
                </div>
                <div class="text">
                    {{ __('site.Our specialist will consult you for free') }}
                </div>
            </div>
            <div class="reach-right">
                <form action="{{ route('orders.store') }}" class="reach-form" method="POST">
                    @method('POST')
                    @csrf
                    <div class="title">
                        {{ __('site.Enter your data and send') }}
                    </div>
                    <div class="form-input-block">
                        <input id="reach_full_name" name="full_name"
                               class="default-input modal-form-input" type="text"
                               placeholder="{{ __('site.Name') }}" required>
                        @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-input-block">
                        <input id="form-phone" name="phone"
                               class="default-input modal-form-input" type="text"
                               placeholder="+7 (700)-999-99-99" required>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="default-btn button-login">
                        {{ __('site.Send') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
