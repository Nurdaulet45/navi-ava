@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') Уведомления @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Уведомления @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me">
                <div class="about-me-form">
                    <div class="form-group change-email-notification">
                        <label for="">Почтовые уведомления</label>
                        <div class="text">Все уведомления будут направляться по адресу anasnasya@mail.ru
                            <a href="">Сменить адрес</a></div>

                    </div>
                    <div class="form-group">
                        <label for="">Звонки и уведомления</label>
                        <div class="input-items">
                            <div class="checkbox">
                                <input class="default-checkbox-input" type="checkbox" id="color-1" name="color-2" value="red">
                                <label for="color-1">Электронная почта</label>
                            </div>
                            <div class="checkbox">
                                <input class="default-checkbox-input" type="checkbox" id="color-2" name="color-2" value="red">
                                <label for="color-2">SMS</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn-default small-btn w-100">
                        Сохранить
                    </button>
                </div>
                <div class="about-right">

                    @include('client.components.aboutMeSettingSidebar')
                </div>




            </div>

        </div>
    </section>
    @include('client.components.sectionWriteToUs', ['gray'  => true])

@endsection
