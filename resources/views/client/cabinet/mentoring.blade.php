@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title')  {{SessionRoleService::textByRole('Наставничество','Консультирование','Обучение','Тип услуги не определен')}} @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active')  {{SessionRoleService::textByRole('Наставничество','Консультирование','Обучение','Тип услуги не определено')}} @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me">
                <form class="about-me-form" action="{{ route('cabinet.saveMentoring') }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="form-group sex-form-group">
                        <label for="">Мой статус на платформе</label>
                        <div class="input-items">
                            <label class="label-default-radio">
                                {{ SessionRoleService::textByRole('Принимаю учеников','Консультирую','Готов к обучению') }}
                                <input type="radio" name="user_status" value="true"
                                       @if($userInformation->user_status) checked @endif>
                                <span class="checkmark"></span>
                            </label>
                            <label class="label-default-radio">
                                {{ SessionRoleService::textByRole('Не принимаю учеников','Не консультирую','Не готов к обучению') }}
                                <input type="radio" name="user_status" value="false"
                                       @if(!$userInformation->user_status) checked @endif>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        @error('user_status')
                        <p class="help-block ">{{ $message }}</p>
                        @enderror
                    </div>

                    @if(!SessionRoleService::isStudent() && !SessionRoleService::isMentor() && !SessionRoleService::isConsultant())
                        <div class="form-group service-price">
                            <label for="service_price"> Стоимость услуг за час</label>
                            <input id="service_price" type="number" class="form-control input-default"
                                   placeholder="Введите сумму"
                                   name="service_price"
                                   value="{{ old('service_price') ?: $userInformation->service_price }}">
                            @error('service_price')
                            <p class="help-block ">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <button class="btn-default small-btn w-100" type="submit">
                        Сохранить
                    </button>
                </form>
                <div class="about-right">
                    @include('client.components.aboutMeSidebar')
                    @include('client.components.cabinetSidebar')
                </div>
            </div>
        </div>
    </section>
    @include('client.components.sectionWriteToUs', ['gray'  => true])
@endsection
