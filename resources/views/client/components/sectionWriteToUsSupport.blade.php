<section class="s-support" id="s-support">
    <div class="container">
        <div class="write-to-support" >
            <div class="left">
                <h2>Напишите нам, если у вас есть вопросы</h2>
            </div>
            <div class="right">
                <form class="support-form" action="{{ route('support.storeQuestion') }}" method="POST">
                    @method('POST')
                    @csrf

                    <div class="form-group input-items">
                        <input type="text" name="email" class="form-control input-default" placeholder="Email">
                        <input type="text" name="phone" id="phone" class="form-control input-default" placeholder="Телефон">
                    </div>
                    @error('email')
                    <p class="help-block mb-2">{{ $message }}</p>
                    @enderror
                    @error('phone')
                    <p class="help-block mb-2">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <textarea name="text" class="form-control textarea-default w-100"
                                  placeholder="Ваше сообщение"
                                  cols="30" rows="5"></textarea>

                        @error('text')
                        <p class="help-block mb-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="buttons">
                        <div class="info-text">
                            Нажимая кнопку «Отправить», я даю согласие на обработку персональных данных
                        </div>
                        <button type="submit" class="btn-default medium-btn">
                            Отправить
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@include('client.components.sectionWriteToUs', ['none' => true])
