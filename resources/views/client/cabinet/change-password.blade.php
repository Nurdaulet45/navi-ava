@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') Смена пароля @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Смена пароля @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me">
                <div class="about-me-form">
                    <div class="form-group">
                        <label for="">Текущий пароль</label>
                        <input type="password" class="form-control input-default w-100" placeholder="Введите пароль">
                    </div>
                    <div class="form-group">
                        <label for="">Новый пароль</label>
                        <input type="password" class="form-control input-default w-100" placeholder="Введите пароль">
                    </div>
                    <div class="form-group">
                        <label for="">Новый пароль ещё раз</label>
                        <input type="password" class="form-control input-default w-100" placeholder="Введите пароль">
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
