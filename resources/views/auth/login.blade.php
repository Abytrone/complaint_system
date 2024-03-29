@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <div class="login-wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-screen">
                <div class="login-body">
                    <a href="#" class="login-logo">
                        <img src="{{asset('img/logo.svg')}}" alt="iChat">
                    </a>
                    <h6>Welcome back,<br>Please log in to your account.</h6>
                    <div class="field-wrapper">
                        <input id="email" name="email" value="{{@old('email')}}" type="email">
                        <label for="email" class="field-placeholder">Email</label>
                        @error('email')
                        <div class="tw-text-red-500">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="field-wrapper mb-3">
                        <input id="password" name="password" type="password">
                        <label for="password" class="field-placeholder">Password</label>
                    </div>
                    <div class="actions">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{__('Forgot password?')}}</a>
                        @endif

                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
