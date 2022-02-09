@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') Наставничество @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Наставничество @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me">
                <div class="about-me-form">
                    <div class="form-group sex-form-group">
                        <label for="">Мой статус на платформе</label>
                        <div class="input-items">
                            <label class="label-default-radio">Мужской
                                <input type="radio" name="radio" value="man" checked>
                                <span class="checkmark"></span>
                            </label>
                            <label class="label-default-radio">Женский
                                <input type="radio" name="radio" value="women">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">
                            Вид наставничества
                        </label>

                        <label class="switch-default-input">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                            <span class="text">
                                Платный
                            </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">
                            Стоимость услуг за час
                        </label>
                        <input type="text" class="form-control input-default" placeholder="Введите сумму">
                    </div>
                    <button class="btn-default small-btn w-100">
                        Сохранить
                    </button>
                </div>
                <div class="about-right">

                    @include('client.components.aboutMeSidebar')
                    @include('client.components.cabinetSidebar')
                </div>
            </div>
        </div>
    </section>
    @include('client.components.sectionWriteToUs', ['gray'  => true])

@endsection
