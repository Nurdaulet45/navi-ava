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
                        <div class="text">Все уведомления будут направляться по адресу {{ auth()->user()->email }}
                            <a href="{{ route('cabinet.changeMail') }}">Сменить адрес</a></div>

                    </div>
                    <form action="{{ route('cabinet.saveSettingNotification') }}" method='post'>
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="">Звонки и уведомления</label>
                            <div class="input-items">
                                <div class="checkbox">
                                    <input class="default-checkbox-input" type="checkbox" id="email-notification"
                                           name="is_mail_notification_enabled"
                                           @if(auth()->user()->is_mail_notification_enabled) checked @endif>
                                    <label for="email-notification">Электронная почта</label>
                                </div>
                                <div class="checkbox">
                                    <input class="default-checkbox-input" type="checkbox" id="phone-notification"
                                           name="is_phone_notification_enabled"
                                           @if(auth()->user()->is_phone_notification_enabled) checked @endif>

                                    <label for="phone-notification">SMS</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn-default small-btn w-100" type="submit">
                            Сохранить
                        </button>
                    </form>
                </div>
                <div class="about-right">

                    @include('client.components.aboutMeSettingSidebar')
                </div>


            </div>

        </div>
    </section>
    @include('client.components.sectionWriteToUs', ['gray'  => true])

@endsection
