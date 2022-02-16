@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') Сертификаты, курсы @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Сертификаты, курсы @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div class="about-me">
                <div id="app" class="w-100">
                    <cabinet-certifications-component/>
                </div>
                <div class="about-right about-right-certifications">
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
    <script>
        @error('file_name')
        alertWarningModal("{{$message}}")
        @enderror
    </script>
@endsection
