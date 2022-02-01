<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('css/breadcrumb.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('css/default.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('css/loader.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('css/header.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('css/modal.css?v=6')}}">
    <link rel="stylesheet" href="{{asset('css/style.css?v=6')}}">
</head>
<body class="wrap d-flex flex-column min-vh-100">
<div class="loader">
    @include('client.components.loader')
</div>
<div class="flex-fill">
    @include('client.components.header')
    {{--    @if($errors->any())--}}
    {{--        @dd($errors->all())--}}
    {{--     @foreach($errors->all() as $error)--}}
    {{--        <li>{{$error}}</li>--}}
    {{--    @endforeach--}}
    {{--    @endif--}}
    @yield('content')
    @include('client.components.modalLogin')
    @include('client.components.modalResetPassword')
    @include('client.components.modalRegister')
</div>
</body>
</html>
