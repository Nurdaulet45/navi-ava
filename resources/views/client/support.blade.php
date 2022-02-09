@extends('layouts/app')
@section('content')
    @component('client.components.breadcrumb')
        @slot('title') Служба поддержки @endslot
        @slot('parent')@endslot
        @slot('active') Служба поддержки @endslot
    @endcomponent
    @include('client.components.sectionWriteToUsSupport')

@endsection
