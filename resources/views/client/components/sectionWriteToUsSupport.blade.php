<section class="s-support">
    <div class="container">
        <div class="write-to-support">
            <div class="left">
                <h2>Напишите нам, если у вас есть вопросы</h2>
            </div>
            <div class="right">
                <div class="support-form">
                    <div class="form-group input-items">
                        <input type="text" class="form-control input-default" placeholder="Email">
                        <input type="text" class="form-control input-default" placeholder="Телефон">
                    </div>
                    <div class="form-group">
                        <textarea name="" class="form-control textarea-default w-100"
                                  placeholder="Ваше сообщение"
                                  cols="30" rows="5"></textarea>
                    </div>
                    <div class="buttons">
                        <div class="info-text">
                            Нажимая кнопку «Отправить», я лаю согласие на обработку персональных данных
                        </div>
                        <button class="btn-default medium-btn">
                            Отправить
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@include('client.components.sectionWriteToUs', ['none' => true])
