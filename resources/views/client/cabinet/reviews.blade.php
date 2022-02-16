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
                    <cabinet-reviews-component :auth_user="{{$user}}"/>
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
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
