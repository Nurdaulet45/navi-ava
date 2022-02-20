@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb')
        @slot('title') Служба поддержки @endslot
        @slot('parent')@endslot
        @slot('active') Служба поддержки @endslot
    @endcomponent
    @include('client.components.sectionWriteToUsSupport')

@endsection
@section('custom_js')
    <script src="{{asset('js/maskinput.js') }}"></script>
    <script>
        $('#phone').mask("+7 (999) 999 99 99");
    </script>
    @endsection
