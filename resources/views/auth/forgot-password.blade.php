{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


@extends('register.layout')
@section('title','Login')
@section('sub-title','Forgotten Password ?')
@section('description','Enter your email to reset your password:')
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

        
    <form class="m-login__form m-form" method="POST" action="{{ route('password.email') }}">
        @csrf
       
        <!-- Email Address -->
        <div class="form-group m-form__group">
            {{-- <x-label for="email" :value="__('Email')" /> --}}

            <x-input id="email" placeholder="Email" class="form-control m-input" type="email" name="email" :value="old('email')" required />
        </div>

      

        <!-- Remember Me -->
        

        <div class="m-login__form-action">
            <x-button class="register btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                {{ __('Email Password Reset Link') }}
            </x-button>&nbsp;&nbsp;

            <a  href="{{route('login')}}"  class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</a>
            </div>

            <div class="m-login__account">
                <span class="m-login__account-msg">
                    Don't have an account yet ?
                </span>&nbsp;&nbsp;
                <a href="{{route('patient-register')}}"  class="m-link m-link--light m-login__account-link">Sign Up</a>
            </div>

    </form>

@endsection
