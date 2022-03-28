@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb')
        @slot('title') Избранное @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Избранное @endslot
    @endcomponent
    <section class="s-about-me-page bg-white">
        <div class="container">

            @if($favorites->count() > 0)
                <div class="about-me">
                    <div class="favorites-mentors">
                        <div class="favorites-mentor cards">
                            @foreach($favorites as $favorite)
                                <a class="mentor-info-card" href="{{ route('mentors.mentor',['id'=>$favorite->mentor_id]) }}">
                                    <div class="left">
                                        <img src="{{ asset($favorite->user->avatarImage) }}" width="92px"
                                             data-widget="92px"
                                             alt="user icon">
                                        <div class="rate">4.5</div>
                                        <div class="review">15 отзывов</div>
                                        <div class="stars">
                                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                    fill="#E0C01A"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="mentor-block-user-name">
                                            <p class="name">
                                                {{ $favorite->user->firstNameAndLetterLastNameCustom }}
                                                ,<span> {{ $favorite->user->login }}</span>
                                            </p>
                                            @if(Cache::has('is_online' . $favorite->mentor_id))
                                                <div class="online"><span></span> В сети</div>
                                            @else
                                                <div class="offline"><span></span> Не в сети</div>
                                            @endif
                                        </div>
                                        <div class="work">{{ $favorite->specialization_text ?: '' }}</div>
                                        <div class="city">{{ $favorite->user->countryAddressCustom }}</div>
                                        <div class="work-info">
                                            <div class="activity">
                                                <p class="medium-small-text gray-text">Сфера деятельности:</p>
                                                <p class="medium-small-text dark-charcoal-text">{{ $favorite->specializationName() }}</p>
                                            </div>
                                            <div class="skills">
                                                <p class="medium-small-text gray-text">Ключевые слова / навыки:</p>
                                                <div class="skill-items">
                                                    @foreach(json_decode($favorite->skills) as $key => $skill)
                                                        <div class="skill-item">
                                                            {{ $skill }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="buttons">
                                                <button
                                                    href="{{ route('mentors.mentor',['id'=>$favorite->mentor_id]) }}"
                                                    class="btn-default-shadow small-btn">
                                                    Начать диалог
                                                </button>
                                                @auth
                                                    @if($favorite->favorite($favorite->user_id,$favorite->role_name))
                                                        <div id="favorite-btn-{{$favorite->mentor_id}}"
                                                             class="btn-white-green w-auto"
                                                             onclick="deleteToFavorite({{$favorite->favorite($favorite->user_id,$favorite->role_name)}},{{$favorite->mentor_id}})">
                                                            Убрать из избранного
                                                            <svg width="17" height="16" viewBox="0 0 17 16">
                                                                <path
                                                                    d="M8.4987 3.01843C6.92815 1.61126 4.51287 1.66231 3.00361 3.17157C1.44151 4.73367 1.44151 7.26633 3.00361 8.8284L7.5559 13.3807C8.07657 13.9014 8.92083 13.9014 9.4415 13.3807L13.9938 8.8284C15.5559 7.26633 15.5559 4.73367 13.9938 3.17157C12.4845 1.66231 10.0692 1.61126 8.4987 3.01843ZM7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                                    fill="#1DC0BD"/>
                                                                <path
                                                                    d="M7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                                    fill="#1DC0BD"/>
                                                            </svg>
                                                        </div>
                                                    @else
                                                        <div id="favorite-btn-{{$favorite->id}}"
                                                             class="btn-white-green w-auto"
                                                             onclick="saveToFavorite({{$favorite->mentor_id}})">
                                                            Добавить в избранное
                                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.49968 3.01843C6.92913 1.61126 4.51384 1.66231 3.00458 3.17157C1.44248 4.73367 1.44248 7.26633 3.00458 8.8284L7.55688 13.3807C8.07754 13.9014 8.92181 13.9014 9.44248 13.3807L13.9947 8.8284C15.5569 7.26633 15.5569 4.73367 13.9947 3.17157C12.4855 1.66231 10.0702 1.61126 8.49968 3.01843ZM7.71861 4.11438L8.02828 4.42403C8.28861 4.68437 8.71074 4.68437 8.97108 4.42403L9.28074 4.11438C10.3221 3.07299 12.0105 3.07299 13.0519 4.11438C14.0933 5.15578 14.0933 6.8442 13.0519 7.8856L8.49968 12.4379L3.94739 7.8856C2.906 6.8442 2.906 5.15578 3.94739 4.11438C4.98879 3.07299 6.67723 3.07299 7.71861 4.11438Z"
                                                                    fill="#1DC0BD"/>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                @endauth
                                                @guest
                                                    <div id="favorite-btn-{{$favorite->mentor_id}}"
                                                         class="btn-white-green w-auto"
                                                         onclick="openLogin()">
                                                        Добавить в избранное
                                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.49968 3.01843C6.92913 1.61126 4.51384 1.66231 3.00458 3.17157C1.44248 4.73367 1.44248 7.26633 3.00458 8.8284L7.55688 13.3807C8.07754 13.9014 8.92181 13.9014 9.44248 13.3807L13.9947 8.8284C15.5569 7.26633 15.5569 4.73367 13.9947 3.17157C12.4855 1.66231 10.0702 1.61126 8.49968 3.01843ZM7.71861 4.11438L8.02828 4.42403C8.28861 4.68437 8.71074 4.68437 8.97108 4.42403L9.28074 4.11438C10.3221 3.07299 12.0105 3.07299 13.0519 4.11438C14.0933 5.15578 14.0933 6.8442 13.0519 7.8856L8.49968 12.4379L3.94739 7.8856C2.906 6.8442 2.906 5.15578 3.94739 4.11438C4.98879 3.07299 6.67723 3.07299 7.71861 4.11438Z"
                                                                fill="#1DC0BD"/>
                                                        </svg>
                                                    </div>
                                                @endguest
                                            </div>
                                            <div class="price">
                                                {{ ($favorite->role_name === 'paid_mentor') ? $favorite->service_price . ' ₽' : 'Бесплатный'}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                            <div class="catalog-ad-card">
                                <h4>Рекламное объявление</h4>
                                <a>Получите чек-лист по профессиям</a>
                            </div>

                        </div>
                    </div>

                    <div class="about-right ad-sidebar">
                        <h4>Ответим на все вопросы</h4>
                        <p>Рекламный баннер призывающий регистрироваться и находить наставников</p>
                    </div>
                    {{ $favorites->withQueryString()->links() }}
                </div>
            @else
                <div class="empty-favorites mt-10">
                    <h4>Здесь пока никого нет</h4>
                    <p>Нажимайте
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.49968 3.01843C6.92913 1.61126 4.51384 1.66231 3.00458 3.17157C1.44248 4.73367 1.44248 7.26633 3.00458 8.8284L7.55688 13.3807C8.07754 13.9014 8.92181 13.9014 9.44248 13.3807L13.9947 8.8284C15.5569 7.26633 15.5569 4.73367 13.9947 3.17157C12.4855 1.66231 10.0702 1.61126 8.49968 3.01843ZM7.71861 4.11438L8.02828 4.42403C8.28861 4.68437 8.71074 4.68437 8.97108 4.42403L9.28074 4.11438C10.3221 3.07299 12.0105 3.07299 13.0519 4.11438C14.0933 5.15578 14.0933 6.8442 13.0519 7.8856L8.49968 12.4379L3.94739 7.8856C2.906 6.8442 2.906 5.15578 3.94739 4.11438C4.98879 3.07299 6.67723 3.07299 7.71861 4.11438Z"
                                fill="#1DC0BD"/>
                        </svg>
                        , чтобы сохранять наставников в избранное
                    </p>
                    <a href="{{ route('mentors.index') }}" class="btn-default medium-btn">
                        Перейти в каталог
                    </a>
                </div>
            @endif
        </div>
    </section>
    @include('client.components.sectionWriteToUs')
@endsection


