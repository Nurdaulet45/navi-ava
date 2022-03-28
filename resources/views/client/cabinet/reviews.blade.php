@extends('layouts/app')

@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') Отзывы @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Отзывы @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me" id="app">
                <div id="app" class="about-me-form">
                    {{--  <cabinet-reviews-component :auth_user="{{$user}}"/>--}}

                    <div class="category-tabs nav" id="pills-tab" role="tablist">
                        <div class="category-tab-item active" id="pills-home-tab" data-toggle="pill"
                             href="#pills-home"
                             role="tab" aria-controls="pills-home" aria-selected="true">
                            Все
                        </div>
                        <div class="category-tab-item " id="pills-profile-tab" data-toggle="pill"
                             href="#pills-profile"
                             role="tab" aria-controls="pills-profile" aria-selected="false">
                            Мои отзывы
                        </div>
                        <div class="category-tab-item " id="pills-contact-tab" data-toggle="pill"
                             href="#pills-contact"
                             role="tab" aria-controls="pills-contact" aria-selected="false">
                            Обо мне
                        </div>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            Пока пустой все
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                             aria-labelledby="pills-profile-tab">
                            <div class="review-items">
                                @if($myReviews->count() > 0)
                                    @foreach($myReviews as $myReview)
                                        <div class="review-item" id="my-review-item-{{$myReview->id}}">
                                            <div class="head">
                                                <div class="info">
                                                    <img
                                                        src="{{ $myReview->userRoleInformation->user->getAvatarImageAttribute() }}"
                                                        width="61"
                                                        alt="user-review">
                                                    <div class="user">
                                                        <div class="name">
                                                            {{ $myReview->userRoleInformation->user->getLastNameAndFirstName() }}
                                                        </div>
                                                        <div class="position">
                                                            {{ $myReview->userRoleInformation->user->getSpecializationTextCustomAttribute() }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="date">
                                                    {{ $myReview->dateFormat() }}
                                                    <div class="stars">
                                                        <input name="star-rating" class="rating result-star-rating"
                                                               data-min="0" data-max="5" data-step="0.1"
                                                               value="{{ $myReview->rate }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="review-text medium-small-text dark-charcoal-text">{!! $myReview->text !!}</div>
                                            @auth
                                                <div class="review-item-buttons">
                                                    @if(!$myReview->checkParentReview)
                                                        <a onclick="openAnswerReviewPopup({{$myReview->id}})"
                                                           class="comment"
                                                           href="javascript:void(0);">
                                                            Комментировать
                                                        </a>
                                                    @endif
                                                    @if($myReview->user_id == $userInformation->id)
                                                        <a onclick="openUpdateReviewPopup({{$myReview->id}})"
                                                           class="comment"
                                                           href="javascript:void(0);">
                                                            Редактровать
                                                        </a>
                                                    @endif
                                                </div>
                                            @endauth

                                            @if($myReview->parentReviews->count() > 0)
                                                <div class="review-item-parents">
                                                    @foreach($myReview->parentReviews as $parentReview)
                                                        <div class="review-item"
                                                             id="my-review-item-parent-{{$parentReview->id}}">
                                                            <div class="head">
                                                                <div class="info">
                                                                    <img
                                                                        src="{{ $parentReview->userRoleInformation->user->getAvatarImageAttribute() }}"
                                                                        width="61"
                                                                        alt="user-review">
                                                                    <div class="user">
                                                                        <div class="name">
                                                                            {{ $parentReview->userRoleInformation->user->getLastNameAndFirstName() }}
                                                                        </div>
                                                                        <div class="position">
                                                                            {{ $parentReview->userRoleInformation->user->getSpecializationTextCustomAttribute() }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="date">
                                                                    {{ $parentReview->dateFormat() }}
                                                                    <div class="stars">
                                                                        <input name="star-rating"
                                                                               class="rating result-star-rating"
                                                                               data-min="0" data-max="5" data-step="0.1"
                                                                               value="{{ $parentReview->rate }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="review-text medium-small-text dark-charcoal-text">{!! $parentReview->text !!}</div>
                                                            @auth
                                                                <div class="review-item-buttons">
                                                                    @if($parentReview->user_id == $userInformation->id)
                                                                        <a onclick="openUpdateParentReviewPopup({{$parentReview->id}})"
                                                                           class="comment"
                                                                           href="javascript:void(0);">
                                                                            Редактровать
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            @endauth
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <div class="line"></div>
                                        </div>
                                    @endforeach
                                @else
                                    Пока пустой мои отзывы
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                             aria-labelledby="pills-contact-tab">
                            <div class="review-items">
                                @if($bothMeReviews->count() > 0)
                                    @foreach($bothMeReviews as $bothMeReview)
                                        <div class="review-item" id="review-item-{{$bothMeReview->id}}">
                                            <div class="head">
                                                <div class="info">
                                                    <img
                                                        src="{{ $bothMeReview->userRoleInformation->user->getAvatarImageAttribute() }}"
                                                        width="61"
                                                        alt="user-review">
                                                    <div class="user">
                                                        <div class="name">
                                                            {{ $bothMeReview->userRoleInformation->user->getLastNameAndFirstName() }}
                                                        </div>
                                                        <div class="position">
                                                            {{ $bothMeReview->userRoleInformation->user->getSpecializationTextCustomAttribute() }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="date">
                                                    {{ $bothMeReview->dateFormat() }}
                                                    <div class="stars">
                                                        <input name="star-rating" class="rating result-star-rating"
                                                               data-min="0" data-max="5" data-step="0.1"
                                                               value="{{ $bothMeReview->rate }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="review-text medium-small-text dark-charcoal-text">{!! $bothMeReview->text !!}</div>
                                            @auth
                                                <div class="review-item-buttons">
                                                    @if(!$bothMeReview->checkParentReview)
                                                        <a onclick="openAnswerReviewPopup({{$bothMeReview->id}})"
                                                           class="comment"
                                                           href="javascript:void(0);">
                                                            Комментировать
                                                        </a>
                                                    @endif
                                                    @if($bothMeReview->user_id == $userInformation->id)
                                                        <a onclick="openUpdateReviewPopup({{$bothMeReview->id}})"
                                                           class="comment"
                                                           href="javascript:void(0);">
                                                            Редактровать
                                                        </a>
                                                    @endif
                                                </div>
                                            @endauth

                                            @if($bothMeReview->parentReviews->count() > 0)
                                                <div class="review-item-parents">
                                                    @foreach($bothMeReview->parentReviews as $parentReview)
                                                        <div class="review-item"
                                                             id="review-item-parent-{{$parentReview->id}}">
                                                            <div class="head">
                                                                <div class="info">
                                                                    <img
                                                                        src="{{ $parentReview->userRoleInformation->user->getAvatarImageAttribute() }}"
                                                                        width="61"
                                                                        alt="user-review">
                                                                    <div class="user">
                                                                        <div class="name">
                                                                            {{ $parentReview->userRoleInformation->user->getLastNameAndFirstName() }}
                                                                        </div>
                                                                        <div class="position">
                                                                            {{ $parentReview->userRoleInformation->user->getSpecializationTextCustomAttribute() }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="date">
                                                                    {{ $parentReview->dateFormat() }}
                                                                    <div class="stars">
                                                                        <input name="star-rating"
                                                                               class="rating result-star-rating"
                                                                               data-min="0" data-max="5" data-step="0.1"
                                                                               value="{{ $parentReview->rate }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="review-text medium-small-text dark-charcoal-text">{!! $parentReview->text !!}</div>
                                                            @auth
                                                                <div class="review-item-buttons">
                                                                    @if($parentReview->user_id == $userInformation->id)
                                                                        <a onclick="openUpdateParentReviewPopup({{$parentReview->id}})"
                                                                           class="comment"
                                                                           href="javascript:void(0);">
                                                                            Редактровать
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            @endauth
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <div class="line"></div>
                                        </div>
                                    @endforeach
                                @else
                                    Пока пустой обо мне
                                @endif
                            </div>
                        </div>
                    </div>
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
@section('custom_js')
    {{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <script>

        $('#answerReviewForm').submit(function (event) {
            event.preventDefault();

            let _token = $('meta[name="csrf-token"]').attr('content')
            let mentorInformationId = {{ $userInformation->id }};
            let textComment = $(this).find('.review-write-textarea').val();
            let ratingStarValue = $(this).find('.star-rating').val();
            let reviewId = $(this).find('#review-id').val();

            $(".loader").addClass("loading")

            $.ajax({
                url: "{{ route('cabinet.reviews.answer.save') }}",
                method: "POST",
                data: {
                    '_token': _token,
                    mentorInformationId: mentorInformationId,
                    textComment: textComment,
                    ratingStarValue: ratingStarValue,
                    reviewId: reviewId,
                },
                success: function (responce) {
                    $(".loader").removeClass("loading")
                    if (responce.status) {
                        alertModal('Комментария успешно отправлено!')
                        $(this).find('.review-write-textarea').val()
                        $(this).find('.star-rating').val(0)

                        setTimeout(() => {
                            window.location.reload();
                        }, 1500)
                    }
                },
                error: function (err) {
                    $(".loader").removeClass("loading")
                    alertWarningModal('Комментария не успешно отправлено!')
                }
            });
        })

        $('#updateReviewForm').submit(function (event) {
            event.preventDefault();

            let _token = $('meta[name="csrf-token"]').attr('content')
            let reviewId = $(this).find('#update-review-id').val()
            let textComment = $(this).find('.review-write-textarea').val()
            let ratingStarValue = $(this).find('.star-rating').val()

            $(".loader").addClass("loading")

            $.ajax({
                url: "{{ route('cabinet.reviews.update') }}",
                method: "POST",
                data: {
                    '_token': _token,
                    reviewId: reviewId,
                    textComment: textComment,
                    ratingStarValue: ratingStarValue,
                },
                success: function (responce) {
                    $(".loader").removeClass("loading")
                    if (responce.status) {
                        alertModal('Комментария успешно обновлено!')
                        $(this).find('.review-write-textarea').val()
                        $(this).find('.star-rating').val(0)

                        setTimeout(() => {
                            window.location.reload();
                        }, 1500)
                    }
                },
                error: function (err) {
                    $(".loader").removeClass("loading")
                    alertWarningModal('Комментария не успешно обновлено!')
                }
            });
        })

        $('#updateParentReviewPopup').submit(function (event) {
            event.preventDefault();

            let _token = $('meta[name="csrf-token"]').attr('content')
            let reviewId = $(this).find('#update-parent-review-id').val()
            let textComment = $(this).find('.review-write-textarea').val()
            let ratingStarValue = $(this).find('.star-rating').val()

            $(".loader").addClass("loading")
            $.ajax({
                url: "{{ route('cabinet.reviews.update') }}",
                method: "POST",
                data: {
                    '_token': _token,
                    reviewId: reviewId,
                    textComment: textComment,
                    ratingStarValue: ratingStarValue,
                },
                success: function (responce) {
                    $(".loader").removeClass("loading")
                    if (responce.status) {
                        alertModal('Комментария успешно обновлено!')
                        $(this).find('.review-write-textarea').val()
                        $(this).find('.star-rating').val(0)

                        setTimeout(() => {
                            window.location.reload();
                        }, 1500)
                    }
                },
                error: function (err) {
                    $(".loader").removeClass("loading")
                    alertWarningModal('Комментария не успешно обновлено!')
                }
            });
        })
    </script>
@endsection
