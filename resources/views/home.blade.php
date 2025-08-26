@extends('layouts.app')

@section('body')
    {{-- hero section --}}
    <section class="container hero">
        <div class="row align-items-center h-100">
            <div class="col-12 col-lg-6">
            <h1>Welcome to <br>BeeProject Forum</h1>
                <p class="mb-4">
                Empowering Developers to Build and Grow with Us
                </p>

                <div class="text-center text-lg-start">
                    <a href="#" class="btn btn-primary me-2 mb-2 mb-lg-0">Sign Up</a>
                    <a href="#" class="btn btn-secondary mb-2 mb-lg-0">Join Discussions</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 h-315px order-first order-lg-last mb-3 mb-lg-0">
                <img class="hero-image float-lg-end" src="{{ url('assets/images/hero2.png') }}" alt="">
            </div>
        </div>
    </section>

    {{-- promotion section --}}
    <section class="container min-h-372px">
        <div class="row">
            <div class="col-12 col-lg-4 text-center">
                <img class="mb-2 promote-icon" src="{{ url('assets/images/discussions.png') }}" />
                <h2 class="fw-bold">Discussions</h2>
                <p class="fs-3">34.834</p>
            </div>

            <div class="col-12 col-lg-4 text-center">
                <img class="mb-2 promote-icon" src="{{ url('assets/images/reply.png') }}" />
                <h2 class="fw-bold">Answers</h2>
                <p class="fs-3">53.674</p>
            </div>

            <div class="col-12 col-lg-4 text-center">
                <img class="mb-2 promote-icon" src="{{ url('assets/images/users.png') }}" />
                <h2 class="fw-bold">Users</h2>
                <p class="fs-3">66.347</p>
            </div>
        </div>
    </section>

    {{-- comment section --}}
    <section class="bg-gray">
        <div class="container py-80px">
            <h2 class="text-center mb-5">Help Others</h2>
            
            <div class="row">
                {{-- comment 1 --}}
                <div class="col-12 col-lg-4 mb-3">
                    <div class="card">
                        <a href="#">
                            <h3>Membuat Validasi di Laravel?</h3>
                        </a>

                        <div>
                            <p class="mb-5">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil, reprehenderit reiciendis. Temporibus sit omnis minus ea mollitia nemo iure architecto.
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-1 me-lg-2">
                                    <a href="#">
                                        <span class="badge rounded-fill text-bg-light">Laravel</span>
                                    </a>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm-wrapper d-flex align-items-center">
                                        <a href="" class="me-1">
                                            <img src="{{ url('assets/images/avatar-dummy.webp') }}" class="avatar rounded-circle">
                                        </a>
                                    </div>

                                    <span class="fs-12px">
                                        <a href="" class="me-1 fw-bold">Wahyu</a>
                                        <span class="color-gray">
                                            10 Hours Ago
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- comment 2 --}}
                <div class="col-12 col-lg-4 mb-3">
                    <div class="card">
                        <a href="#">
                            <h3>Membuat Validasi di Laravel?</h3>
                        </a>

                        <div>
                            <p class="mb-5">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil, reprehenderit reiciendis. Temporibus sit omnis minus ea mollitia nemo iure architecto.
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-1 me-lg-2">
                                    <a href="#">
                                        <span class="badge rounded-fill text-bg-light">Laravel</span>
                                    </a>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm-wrapper d-flex align-items-center">
                                        <a href="" class="me-1">
                                            <img src="{{ url('assets/images/avatar-dummy.webp') }}" class="avatar rounded-circle">
                                        </a>
                                    </div>

                                    <span class="fs-12px">
                                        <a href="" class="me-1 fw-bold">Wahyu</a>
                                        <span class="color-gray">
                                            10 Hours Ago
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- comment 3 --}}
                <div class="col-12 col-lg-4 mb-3">
                    <div class="card">
                        <a href="#">
                            <h3>Membuat Validasi di Laravel?</h3>
                        </a>

                        <div>
                            <p class="mb-5">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil, reprehenderit reiciendis. Temporibus sit omnis minus ea mollitia nemo iure architecto.
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-1 me-lg-2">
                                    <a href="#">
                                        <span class="badge rounded-fill text-bg-light">Laravel</span>
                                    </a>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm-wrapper d-flex align-items-center">
                                        <a href="" class="me-1">
                                            <img src="{{ url('assets/images/avatar-dummy.webp') }}" class="avatar rounded-circle">
                                        </a>
                                    </div>

                                    <span class="fs-12px">
                                        <a href="" class="me-1 fw-bold">Wahyu</a>
                                        <span class="color-gray">
                                            10 Hours Ago
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </section>

    {{-- CTA section --}}
    <section class="container min-h-372px d-flex flex-column align-items-center justify-content-center">
        <h2>Ready to contribute?</h2>

        <p class="mb-4">want to make a big impact</p>

        <div class="text-center">
            <a href="#" class="btn btn-primary me-2 mb-2 mb-lg-0">Sign Up</a>
            <a href="#" class="btn btn-secondary mb-2 mb-lg-0">Join Discussions</a>
        </div>
    </section>
@endsection