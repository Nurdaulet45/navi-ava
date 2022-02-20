<section class="s-write-to-us @if(isset($gray) && $gray) bg-gray @elseif(isset($none) && $none) @else bg-white @endif">
    <div class="container">
        <div class="title">
            Остались вопросы?
        </div>
        @if(request()->is('support'))
            <a href="#breadcrumbs" class="btn-default-shadow medium-btn btn-scroll-smooth">
                Напишите нам
            </a>
            @else
            <a href="{{ route('support') }}" class="btn-default-shadow medium-btn">
                Напишите нам
            </a>
            @endif

    </div>
</section>
