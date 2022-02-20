@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb')
        @slot('classes') blog-breadcrumb @endslot
        @slot('style')
{{--            background-image: url( ../storage/images/posts/blog_default_header.png )--}}
            background-image: url( @if(isset($post->header_image))../storage/images/posts/blog_default_header.png @else ../images/blog_default_header.png  @endif )
        @endslot
        @slot('title') {{ $post->title }}@endslot
        @slot('parent')@endslot
        @slot('blog')@endslot
        @slot('active') {{ $post->title }}  @endslot
    @endcomponent
    <section class="s-blog-item">
        <div class="container">
            <div class="post-description">
                {!! $post->description !!}
            </div>
        </div>
    </section>
    @include('client.components.sectionWriteToUs')
@endsection
