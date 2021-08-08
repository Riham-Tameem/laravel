@extends('register.layout')
@section('title','Doctor Register')
@section('sub-title','Doctor Register')
@section('description','Enter your details to create your account:')
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

        
    <form class="m-login__form m-form" method="POST" action="{{ route('doctor-register') }}">
        @csrf
        <!-- Name -->
        <div class="form-group m-form__group">

            {{-- <x-input id="name" class="form-control m-input" type="text" name="name" :value="old('name')" required autofocus /> --}}
            <input class="form-control m-input" type="text" placeholder="Name" name="name" id="name" value="{{old('name')}}" autofocus>
        </div>
    
        <!-- City -->
        <div class="form-group m-form__group">
            {{-- <x-label for="gender" :value="__('Gender')" /> --}}

            <select id="gender" class="form-control m-input" name="gender" required>
                <option value='' selected>Select Gender</option>
                
                <option {{old('gender')=='M'?"selected":""}} value='M'>Male</option>
                <option {{old('gender')=='F'?"selected":""}} value='F'>Female</option>
            </select>
        </div>


        <!-- Speciality -->
        <div class="form-group m-form__group">
            {{-- <x-label for="speciality_id" :value="__('Speciality')" /> --}}

            <select id="speciality_id" class="form-control m-input" name="speciality_id" required>
                <option value='' selected >Select Speciality</option>
                @foreach( $specialities as $speciality)
                    <option {{old('speciality_id')==$speciality->id?'selected':''}}
                    value='{{$speciality->id}}'>{{$speciality->name}} 
                    </option>
                @endforeach
            </select>
        </div>
        <!-- City -->
        <div class="form-group m-form__group">
            {{-- <x-label for="city_id" :value="__('City')" /> --}}

            <select id="city_id" class="form-control m-input" name="city_id" required>
                <option value=''selected >Select City</option>
                @foreach( $cities as $city)
                    <option {{old('city_id')==$city->id?'selected':''}}
                    value='{{$city->id}}'>{{$city->name}} 
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Address -->
        <div class="form-group m-form__group">
            {{-- <x-label for="address" :value="__('Address')" /> --}}

            <x-input id="address" placeholder="Address" class="form-control m-input" type="text" name="address" :value="old('address')" required />
        </div>
        <!-- Mobile -->
        <div class="form-group m-form__group">
            {{-- <x-label for="mobile" :value="__('Mobile')" /> --}}

            <x-input id="mobile" placeholder="Mobile" class="form-control m-input" type="tel" name="mobile" :value="old('mobile')" required />
        </div>
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

        <!-- Confirm Password -->
        <div class="form-group m-form__group">
            {{-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

            <x-input id="password_confirmation" class="form-control m-input"
                            type="password"
                            placeholder="Confirm Password"
                            name="password_confirmation" required />
        </div>
        <div class="row form-group m-form__group m-login__form-sub">
            <div class="col m--align-left">
                <label >
                    
                    <a  href="{{ route('login') }} "  class="m-link m-link--focus"> 
                        {{ __('Already registered?') }}
                    </a>.
                
                </label>
                <span class="m-form__help"></span>
            </div>
        </div>


        <div class="m-login__form-action">
        
            <x-button class="register btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                {{ __('Register') }}
            </x-button>&nbsp;&nbsp;
            <a  href="{{route('login')}}"  class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</a>
        </div>


    </form>

@endsection