<section class="s-breadcrumb">
    <div class="container">
        <div class="breadcrumb-items">
            <div class="breadcrumbs-item">
                <a href=" route('index')}}" class=""> {{ __('site.Home') }}</a>
                <span class="page-link-dot"></span>
            </div>
            @if(isset($courses))
            <div class="breadcrumbs-item">
                <a href=" route('courses.index')}}" class="">{{ __('site.Course catalog') }}</a>
                <span class="page-link-dot"></span>
            </div>
            @endif

            @if(isset($course))
                <div class="breadcrumbs-item">
                    <a href="{{ $course_route}}">{{$course}}</a>
                    <span class="page-link-dot"></span>
                </div>
            @endif

            @if(isset($lesson))
                <div class="breadcrumbs-item">
                    <a href="{{$lesson_route}}">{{ $lesson }}</a>
                    <span class="page-link-dot"></span>
                </div>
            @endif
            @if(isset($questions))
                <div class="breadcrumbs-item">
                    <a href=" route('questions.index')}}">{{ $questions }}</a>
                    <span class="page-link-dot"></span>
                </div>
            @endif

            <div class="breadcrumbs-item">
                <a class="active">
                    {{ $active }}
                </a>
            </div>
        </div>
        <h2 class="breadcrumb-title">
            @if(isset($title)) {{$title}} @endif
        </h2>
    </div>
</section>
