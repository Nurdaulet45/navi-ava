<section class="s-breadcrumb @if(isset($gray) && $gray) bg-gray @else bg-white @endif" >
    <div class="container">
        <div class="breadcrumb-items">
            @if(isset($parent))
                <div class="breadcrumbs-item">
                    <a href="{{ route('index')}}" class="">Главная</a>
                    <svg class="icon-right" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.29289 18.7071C8.90237 18.3166 8.90237 17.6834 9.29289 17.2929L14.5858 12L9.29289 6.7071C8.90237 6.3166 8.90237 5.6834 9.29289 5.2929C9.68342 4.9024 10.3166 4.9024 10.7071 5.2929L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L10.7071 18.7071C10.3166 19.0976 9.68342 19.0976 9.29289 18.7071Z"
                            fill="#A5A7B0"/>
                    </svg>
                </div>
            @endif
            @if(isset($cabinet))
                <div class="breadcrumbs-item">
                    <a href="{{ route('cabinet')}}" class="">Личный кабинет</a>
                    <svg class="icon-right" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.29289 18.7071C8.90237 18.3166 8.90237 17.6834 9.29289 17.2929L14.5858 12L9.29289 6.7071C8.90237 6.3166 8.90237 5.6834 9.29289 5.2929C9.68342 4.9024 10.3166 4.9024 10.7071 5.2929L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L10.7071 18.7071C10.3166 19.0976 9.68342 19.0976 9.29289 18.7071Z"
                            fill="#A5A7B0"/>
                    </svg>
                </div>
            @endif
            @if(isset($blog))
                <div class="breadcrumbs-item">
                    <a href="{{ route('blog')}}" class="">Блог</a>
                    <svg class="icon-right" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.29289 18.7071C8.90237 18.3166 8.90237 17.6834 9.29289 17.2929L14.5858 12L9.29289 6.7071C8.90237 6.3166 8.90237 5.6834 9.29289 5.2929C9.68342 4.9024 10.3166 4.9024 10.7071 5.2929L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L10.7071 18.7071C10.3166 19.0976 9.68342 19.0976 9.29289 18.7071Z"
                            fill="#A5A7B0"/>
                    </svg>
                </div>
            @endif

            @if(isset($active))
                <div class="breadcrumbs-item">
                    <a class="active">
                        {{ $active }}
                    </a>
                </div>
            @endif

        </div>
        @if(isset($title))
            <h2 class="breadcrumb-title">
                {{$title}}
            </h2>
        @endif
    </div>
</section>
