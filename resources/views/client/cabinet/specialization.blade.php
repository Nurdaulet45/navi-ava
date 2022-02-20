@extends('layouts/app')

@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') Специализация @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Специализация @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me">
                <form class="about-me-form" action="{{ route('cabinet.saveSpecialization') }}" method="POST">
                    @method('POST')
                    @csrf
                    @if(!\App\Services\SessionRoleService::isStudent())
                        <div class="form-group">
                            <label>
                                Ваша специальность
                            </label>
                            <input type="text" class="form-control input-default"
                                   placeholder="Введите вашу специальность"
                                   name="specialization_text"
                                   value="{{ old('specialization_text') ?: auth()->user()->specialization_text  }}"
                            >
                        </div>
                    @endif
                    <div class="form-group ">
                        <label for="">Сферы деятельности
                            <div class="dropdown-menu dropdown-spec-info">
                            <span class="dropdown-body">
                                  <svg width="20" class="icon-info" height="20" viewBox="0 0 20 20" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.99935 3.33341C6.31745 3.33341 3.33268 6.31818 3.33268 10.0001C3.33268 13.682 6.31745 16.6667 9.99935 16.6667C13.6813 16.6667 16.666 13.682 16.666 10.0001C16.666 6.31818 13.6813 3.33341 9.99935 3.33341ZM1.66602 10.0001C1.66602 5.39771 5.39697 1.66675 9.99935 1.66675C14.6017 1.66675 18.3327 5.39771 18.3327 10.0001C18.3327 14.6024 14.6017 18.3334 9.99935 18.3334C5.39697 18.3334 1.66602 14.6024 1.66602 10.0001Z"
                                    fill="#D6FFFE"/>
                                <path
                                    d="M9.99935 8.33325C10.4596 8.33325 10.8327 8.70634 10.8327 9.16659V14.1666C10.8327 14.6268 10.4596 14.9999 9.99935 14.9999C9.5391 14.9999 9.16602 14.6268 9.16602 14.1666V9.16659C9.16602 8.70634 9.5391 8.33325 9.99935 8.33325Z"
                                    fill="#D6FFFE"/>
                                <path
                                    d="M11.25 6.25C11.25 6.94036 10.6903 7.5 10 7.5C9.30967 7.5 8.75 6.94036 8.75 6.25C8.75 5.55964 9.30967 5 10 5C10.6903 5 11.25 5.55964 11.25 6.25Z"
                                    fill="#D6FFFE"/>
                            </svg>
                            </span>
                                <div class="dropdown-content dropdown-spec-info-content">
                                    Если ваша профессия, специальность не подпадает под указанные отрасли, то выберите
                                    более подходящее или «другое» и дальше заполните профиль. Затем через службу
                                    поддержки, отправьте нам запрос на вашу отрасль/специализацию, по мере накопления,
                                    таких запросов ваша отрасль/специализация будет выведена тоже в общий список. Но вы
                                    не переживайте, по поисковой строке вас в любом случае найдут по указанным вами
                                    специализации, профессии, должности и словам «тегам»
                                </div>
                            </div>
                        </label>
                        <div class="spec-items">

                            <div class="input-items">
                                @foreach($leftBlockSpecializations as $specialization)
                                    <label class="label-default-radio">
                                        {{ $specialization->name }}
                                        <input type="radio" name="specialization_id" value="{{ $specialization->id }}"
                                               @if((old('specialization_id') ?: auth()->user()->specialization_id) == $specialization->id) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="input-items">
                                @foreach($rightBlockSpecializations as $specialization)
                                    <label class="label-default-radio">
                                        {{ $specialization->name }}
                                        <input type="radio" name="specialization_id" value="{{ $specialization->id }}"
                                               @if(auth()->user()->specialization_id == $specialization->id ) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Ключевые слова / навыки
                            <div class="dropdown-menu dropdown-skills-info">
                                <span class="dropdown-body">
                                      <svg width="20" class="icon-info" height="20" viewBox="0 0 20 20" fill="none"
                                           xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.99935 3.33341C6.31745 3.33341 3.33268 6.31818 3.33268 10.0001C3.33268 13.682 6.31745 16.6667 9.99935 16.6667C13.6813 16.6667 16.666 13.682 16.666 10.0001C16.666 6.31818 13.6813 3.33341 9.99935 3.33341ZM1.66602 10.0001C1.66602 5.39771 5.39697 1.66675 9.99935 1.66675C14.6017 1.66675 18.3327 5.39771 18.3327 10.0001C18.3327 14.6024 14.6017 18.3334 9.99935 18.3334C5.39697 18.3334 1.66602 14.6024 1.66602 10.0001Z"
                                        fill="#D6FFFE"/>
                                    <path
                                        d="M9.99935 8.33325C10.4596 8.33325 10.8327 8.70634 10.8327 9.16659V14.1666C10.8327 14.6268 10.4596 14.9999 9.99935 14.9999C9.5391 14.9999 9.16602 14.6268 9.16602 14.1666V9.16659C9.16602 8.70634 9.5391 8.33325 9.99935 8.33325Z"
                                        fill="#D6FFFE"/>
                                    <path
                                        d="M11.25 6.25C11.25 6.94036 10.6903 7.5 10 7.5C9.30967 7.5 8.75 6.94036 8.75 6.25C8.75 5.55964 9.30967 5 10 5C10.6903 5 11.25 5.55964 11.25 6.25Z"
                                        fill="#D6FFFE"/>
                                </svg>
                                </span>
                                <div class="dropdown-content dropdown-skills-info-content">
                                    Чтобы вас можно было легко находить на платформе, вы должны применять в тексте
                                    «теги"- слова/выражения по которым ваш аватар (профиль) будет легче найти, при
                                    поиске через поисковую строку. Для этого даётся возможность заполнения до 10 тегов.
                                    То есть по этим ключевым словам или навыкам вас могут найти. Эти слова „теги“ вы
                                    можете также писать в текстах при заполнении блока „О себе“ или „С чем могу помочь“
                                    перечисляя свои навыки, умения, знания.
                                </div>
                            </div>
                        </label>
                        <span class="info">Заполните до 10 ключевых слов / навыков</span>

                        <div id="app">
                            <cabinet-skills-input-component
                                :skills_items="{{json_encode(old('skills') ?: auth()->user()->skills)}}"/>
                        </div>
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
@section('custom_js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
