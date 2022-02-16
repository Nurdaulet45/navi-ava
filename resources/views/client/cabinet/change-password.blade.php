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
                    <form action="{{ route('cabinet.saveChangePassword') }}" method="post">
                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="">Текущий пароль</label>
                            <input type="password" name="password" class="form-control input-default w-100"
                                   value="{{ old('password') }}"
                                   placeholder="Введите пароль">
                            @error('password')
                            <p class="help-block ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Новый пароль</label>
                            <input type="password" name="new_password" class="form-control input-default w-100"
                                   value="{{ old('new_password') }}"
                                   placeholder="Введите пароль">
                            @error('new_password')
                            <p class="help-block ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Новый пароль ещё раз</label>
                            <input type="password" name="new_password_confirmation" class="form-control input-default w-100"
                                   value="{{ old('new_password_confirmation') }}"
                                   placeholder="Введите пароль">
                            @error('new_password_confirmation')
                            <p class="help-block ">{{ $message }}</p>
                            @enderror
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
