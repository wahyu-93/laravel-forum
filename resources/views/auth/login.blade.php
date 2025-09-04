@extends('layouts.auth')

@section('title','Login - BeeForum')

@section('body')
    <section class="bg-gray vh-100">
        <div class="container h-100 pt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4">
                    <a href="" class="nav-link mb-5 text-center">
                        <img class="h-48px" src="{{ asset('assets/images/logo-biru.png') }}" alt="Logo">
                    </a>

                    <div class="card mb-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label" >Email</label>
          
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    
                                    <div class="input-group">
                                        <input type="text" class="form-control border-end-0 rounded-0 rounded-start @error('password') is-invalid @enderror" name="password" id="password">
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
    
                                <div class="mb-3 d-grid">
                                    <button type="submit" class="btn btn-primary rounded">Log In</button>
                                </div>
    
                            </div>
                        </form>
                    </div>
                    
                    <div class="text-center">
                        Don't have an account? <a href="{{ route('register') }}" class="text-decoration-underline">Sign up</a>
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