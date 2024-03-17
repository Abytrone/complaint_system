@extends('layouts.guest')
@section('content')
    <div class="login-wrapper">

        <div class="login-screen" style="max-width: 450px">
            <div class="login-body" >
                <a href="#" class="login-logo">
                    <img src="{{asset('img/logo.svg')}}" alt="iChat">
                </a>
                <div class="tw-mb-4 tw-text-sm tw-text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="tw-mb-4 tw-font-medium tw-text-sm tw-text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="tw-my-4 tw-flex tw-items-center tw-justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button class="btn btn-secondary">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
