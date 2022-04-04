<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:type" content="profile"/>
    <meta property="og:title" content="{{ env('APP_NAME') }}"/>
    <meta property="og:description" content="{{ env('APP_NAME') }}"/>
    <meta property="og:image" content="{{ env('APP_URL') . '/images/logo.svg'}}"/>
    <meta property="og:url" content="{{env('APP_URL')}}"/>
    <meta property="og:site_name" content="{{ env('APP_NAME') }}"/>
    <meta property="og:see_also" content="{{env('APP_URL')}}"/>

    <meta itemprop="name" content=""/>
    <meta itemprop="description" content=""/>
    <meta itemprop="image" content="{{env('APP_URL') . '/images/logo.png'}}"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', env('APP_NAME'))</title>
    {{--    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">--}}

    @yield('custom_css')

    <link rel="stylesheet" href="{{ asset('css/star-rating.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}"/>

    <link rel="stylesheet" href="{{asset('css/fonts.css?v=5')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/default.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('css/breadcrumb.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('css/header.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('css/modal.css?v=5.1')}}">

    <link rel="stylesheet" href="{{asset('css/style.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('css/loader.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('css/main.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('css/catalog.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('css/cabinet.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('css/blog.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('css/banner.css?v=5.1')}}">
    <link rel="stylesheet" href="{{asset('/admin_asset/plugins/sweetalert2/sweetalert2.css?v=9')}}">
</head>
<body class="wrap d-flex flex-column min-vh-100">
@include('client.components.bannerMain')

<div class="loader">
    @include('client.components.loader')
</div>
<div class="flex-fill" id="app">
    @include('client.components.header')
    @yield('content')
    @include('client.components.modalLogin')
    @include('client.components.modalResetPassword')
    @include('client.components.modalRegister')

    @auth
        @include('client.components.modalAddReview')
        @include('client.components.modalAnswerReview')
        @include('client.components.modalUpdateReview')
        @include('client.components.modalUpdateParentReview')
    @endauth
</div>
@include('client.components.footer')

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('/admin_asset/plugins/sweetalert2/sweetalert2.js?v=9')}}"></script>
<script src="{{asset('/admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('/js/star-rating.min.js') }}"></script>
<script src="{{ asset('/js/theme.js') }}"></script>
<script src="{{ asset('/js/LANG.js') }}"></script>

<script src="{{asset('js/script.js?v=5.3')}}"></script>

<script>
    @if(session('success'))
    alertModal("{{session('success')}}")
    @endif
    @error('invalid_link')
    alertWarningModal("{{$message}}")
    @enderror
</script>

@yield('custom_js')

</body>
</html>
