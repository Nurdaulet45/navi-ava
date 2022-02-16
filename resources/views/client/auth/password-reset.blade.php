@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="inner-modal m-tb-50" >
                    <div class="login-form-header">
                        <h3 class="title">
                            {{ __('site.Reset password') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form class="default-form"  method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}" >
                            <div class="form-group">
                                <input class="form-control input-default w-100"
                                       id="password"
                                       name="password" type="password" placeholder="Құпия сөз">
                                @error('password')
                                <p class="help-block">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="form-group">
                                <input class="form-control input-default w-100"
                                       id="password_confirmation"
                                       name="password_confirmation" type="password" placeholder="Құпия сөзді қайталаңыз">
                                @error('password_confirmation')
                                <p class="help-block">{{ $message }}</p>
                                @enderror
                                @error('msg')
                                <p class="help-block text-center">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                    class="btn-default medium-btn w-100">
                                {{ __('site.Restore password') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
