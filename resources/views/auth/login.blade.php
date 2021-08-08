{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('register.layout')
@section('title','Login')
@section('sub-title','Sign In')
@section('description','')
@section('content')		

    <div class="">
        <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
        
            <div class="m-alert__text">
            <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
        
        </div>
    </div>
    <div class="form-group m-form__group">
        <x-auth-validation-errors class=" alert alert-danger mt-4  mb-2" :errors="$errors" />
    </div>

        
    <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
        @csrf
       
        <!-- Email Address -->
        <div class="form-group m-form__group">
            {{-- <x-label for="email" :value="__('Email')" /> --}}

            <x-input id="email" placeholder="Email" class="form-control m-input" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="form-group m-form__group">
            {{-- <x-label for="password" :value="__('Password')" /> --}}

            <x-input id="password" placeholder="Password" class="form-control m-input"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Remember Me -->
        <div class="row m-login__form-sub">
            <div class="col m--align-left m-login__form-left">
                <label for="remember_me" class="m-checkbox  m-checkbox--light">
                    {{-- <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span> --}}
                    <input id="remember_me" type="checkbox" name="remember"> {{ __('Remember me') }}
                    <span></span>
                </label>
            </div>

            <div class="col m--align-right m-login__form-right">
                {{-- <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a> --}}
                
                @if (Route::has('password.request'))
                <a class="m-link" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            </div>
            
        </div>

        <div class="m-login__form-action">
            <x-button class="register btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                {{ __('Log in') }}
            </x-button>
        </div>

        <div class="m-login__account">
            <span class="m-login__account-msg">
                Don't have an account yet ?
            </span>&nbsp;&nbsp;
            <a href="{{route('patient-register')}}"  class="m-link m-link--light m-login__account-link">Sign Up</a>
        </div>


    </form>

@endsection
