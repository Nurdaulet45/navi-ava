<section class="s-write-to-us @if(isset($gray) && $gray) bg-gray @elseif(isset($none) && $none) @else bg-white @endif">
    <div class="container">
        <div class="title">
            Остались вопросы?
        </div>

        <div class="support-button-block">
            @if(request()->is('support'))
                <a href="#breadcrumbs" class="btn-default-shadow medium-btn btn-scroll-smooth">
                    <span>Здесь </span> &nbsp; вы найдете больше информации
                </a>
            @else
                <a href="{{ route('support') }}" class="btn-default-shadow medium-btn">
                    <span>Здесь </span> &nbsp; вы найдете больше информации
                </a>
            @endif
        </div>
    </div>
</section>
