{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.auth')

@section('title','Register - BeeForum')

@section('body')
    <section class="bg-gray vh-100">
        <div class="container h-100 pt-5">
            <div class="row justify-content-center pt-5">
                 <div class="col-12 col-lg-6 my-auto mb-5 mb-lg-auto me-0">
                    <div class="d-none d-lg-block">
                        <h2>Join the BeeProject Community</h2>
                        <p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
                                <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero, quae.</li>
                            </ul>
                        </p>
                    </div>

                    <div class="d-block d-lg-none fs-4 text-center">
                        Create your account in a minute, it's free
                    </div>

                </div>

                <div class="col-12 col-lg-4">
                    <a href="" class="nav-link mb-5 text-center">
                        <img class="h-48px" src="{{ asset('assets/images/logo-biru.png') }}" alt="Logo">
                    </a>

                    <div class="card mb-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                 <div class="form-group mb-3">
                                    <label for="name" class="form-label" >Full Name</label>

                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="username" class="form-label">Username</label>

                                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">    
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror                               
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email" class="form-label" >Email</label>

                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 rounded-0 rounded-start @error('password') is-invalid @enderror" name="password" id="password" required>
                                        <span class="input-group-text bg-white border-start-0 pe-auto" id="basic-addon2">
                                            <a href="javascript:;" id="password-toggle">
                                                <img src="{{ url('assets/images/eye-slash.png') }}" alt="password" id="password-toggle-img">
                                            </a>
                                        </span>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                    <input type="password" class="form-control border-end-0 rounded-0 rounded-start" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="mb-3 d-grid">
                                    <button type="submit" class="btn btn-primary rounded">Sign up</button>
                                </div>
    
                            </div>
                        </form>
                    </div>
                    
                    <div class="text-center">
                        Already  have an account? <a href="{{ route('login') }}" class="text-decoration-underline">Login</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-script')
    <script>
        var isPasswordRevealed = false;

        $('#password-toggle').on('click', function(){
            isPasswordRevealed = !isPasswordRevealed;

            if(isPasswordRevealed){
                $('#password-toggle-img').attr('src', "{{ url('assets/images/eye.png') }}")
                $("#password").attr('type','text');
            }
            else {
                $('#password-toggle-img').attr('src', "{{ url('assets/images/eye-slash.png') }}")
                $("#password").attr('type','password');
            }
        })
    </script>
@endpush
