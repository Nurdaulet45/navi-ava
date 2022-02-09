@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') Смена почты @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Смена почты @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me">
                <div class="about-me-form">
                    <div class="form-group">
                        <label for="">Текущий почтовый адрес</label>
                        <input type="text" class="form-control input-default w-100" placeholder="@mail.ru" disabled value="anasnasya@mail.ru">
                    </div>
                    <div class="form-group">
                        <label for="">Новый почтовый адрес</label>
                        <input type="text" class="form-control input-default w-100" placeholder="Почта">
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
