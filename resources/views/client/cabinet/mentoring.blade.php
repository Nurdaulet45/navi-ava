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
                <form class="about-me-form" action="{{ route('cabinet.saveMentoring') }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="form-group sex-form-group">
                        <label for="">Мой статус на платформе</label>
                        <div class="input-items">
                            <label class="label-default-radio">Принимаю учеников-менти
                                <input type="radio" name="is_accept_students" value="true"
                                       @if(auth()->user()->is_accept_students) checked @endif>
                                <span class="checkmark"></span>
                            </label>
                            <label class="label-default-radio">Не принимаю учеников-менти
                                <input type="radio" name="is_accept_students" value="false"
                                       @if(!auth()->user()->is_accept_students) checked @endif>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        @error('is_accept_students')
                        <p class="help-block ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">
                            Вид наставничества
                        </label>

                        <label class="switch-default-input">
                            <input type="checkbox" id="profile_is_service_payable" name="is_service_payable"
                                   @if((old('is_service_payable') && old('is_service_payable') == 'on')
 || auth()->user()->is_service_payable) checked @endif>>
                            <span class="slider round"></span>
                            <span class="text">
                                Платный
                            </span>
                        </label>
                        @error('is_service_payable')
                        <p class="help-block ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group service-price" style="@if(!(old('is_service_payable') && old('is_service_payable') == 'on')
 && !auth()->user()->is_service_payable) display: none @else @endif">
                        <label for="">
                            Стоимость услуг за час
                        </label>
                        <input type="number" class="form-control input-default"
                               placeholder="Введите сумму"
                               name="service_price"
                               value="{{ old('service_price') ?: auth()->user()->service_price }}"
                        >
                        @error('service_price')
                        <p class="help-block ">{{ $message }}</p>
                        @enderror
                    </div>
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
