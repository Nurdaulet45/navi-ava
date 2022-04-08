@extends('layouts/app')

@section('content')
    @component('client.components.breadcrumb', ['gray' => true])
        @slot('title') Чат @endslot
        @slot('parent')@endslot
        @slot('cabinet')@endslot
        @slot('active') Чат @endslot
    @endcomponent
    <section class="s-about-me-page">
        <div class="container">
            <div id="app" class="about-me">
                <chat-app :user="{{ $user }}" :information="{{ $userRoleInformation }}"></chat-app>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
