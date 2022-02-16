@extends('layouts.app')
@section('content')
    <section class="s-cabinet">
        <div class="wrapper alert-verify-email success-verify-email">
            <div class="container">
                <div class="alert-verify-email__block">
                    <div class="text">

                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.96116 2.16699C5.38783 2.16699 1.66699 5.90533 1.66699 10.5003C1.66699 15.0953 5.40533 18.8337 10.0003 18.8337C14.5953 18.8337 18.3337 15.0953 18.3337 10.5003C18.3337 5.90533 14.5778 2.16699 9.96116 2.16699ZM10.8337 14.667H9.16699V13.0003H10.8337V14.667ZM10.8337 11.3337H9.16699V6.33366H10.8337V11.3337Z"
                                fill="#FF5500"/>
                        </svg>
                        Адрес электронной почты подтвержден.
                    </div>
                </div>

            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="alert-verify-email__body">
                    <div class="verify-email-success">
                        <div id="success-json"></div>
                    </div>
                    <div class="title">
                        Дорогой друг, благодарим вас за регистрацию на NAVI-AVA

                    </div>

                    <a href="{{ route('cabinet') }}" class="btn-default medium-btn w-auto">
                        Перейти в личный кабинет
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('custom_js')
    <script src="{{ asset('js/lottie.js') }}"></script>
    <script>
        $(document).ready(function () {

            var svgContainer2 = document.getElementById('success-json');
            var animItem = bodymovin.loadAnimation({
                wrapper: svgContainer2,
                animType: 'svg',
                loop: false,
                path:  '{{ asset('animation/success.json') }}'
            });
        })

    </script>
@endsection
