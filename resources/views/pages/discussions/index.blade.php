@extends('layouts.app')

@section('title','BeeForum - Discussions')

@section('body')
    <section class="bg-gray pt-4 pb-5 flex-grow-1">
        <div class="container">
            <div class="mb-4">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h2 class="me-4 mb-0">All Discussions</h2>
                    
                    <div>
                        51.875 Discussion
                    </div>
                </div>

                @auth
                    <a href="{{ route('discussion.create') }}" class="btn btn-primary">Create New Discussion</a>
                @endauth
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    {{-- post 1 --}}
                    <div class="card card-discussions">
                        <div class="row">
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                <div class="text-nowrap me-2 me-lg-0">
                                    7 likes
                                </div>

                                <div class="text-nowrap color-gray">
                                    9 Answers
                                </div>
                            </div>

                            <div class="col-12 col-lg-10">
                                <a href="">
                                    <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, itaque!</h4>
                                </a>
                            
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem consequatur, explicabo maxime excepturi dolorum fugit? Minus impedit consectetur distinctio hic!</p>
                                
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

                    {{-- post 2 --}}
                     <div class="card card-discussions">
                        <div class="row">
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                <div class="text-nowrap me-2 me-lg-0">
                                    7 likes
                                </div>

                                <div class="text-nowrap color-gray">
                                    9 Answers
                                </div>
                            </div>

                            <div class="col-12 col-lg-10">
                                <a href="">
                                    <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, itaque!</h4>
                                </a>
                            
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem consequatur, explicabo maxime excepturi dolorum fugit? Minus impedit consectetur distinctio hic!</p>
                                
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

                    {{-- post 3 --}}
                     <div class="card card-discussions">
                        <div class="row">
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                <div class="text-nowrap me-2 me-lg-0">
                                    7 likes
                                </div>

                                <div class="text-nowrap color-gray">
                                    9 Answers
                                </div>
                            </div>

                            <div class="col-12 col-lg-10">
                                <a href="">
                                    <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, itaque!</h4>
                                </a>
                            
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem consequatur, explicabo maxime excepturi dolorum fugit? Minus impedit consectetur distinctio hic!</p>
                                
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

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <h3>All Categories</h3>
                        <div>
                            <a href="">
                                <span class="badge rounded-pill text-bg-light">Laravel</span>
                            </a>

                            <a href="">
                                <span class="badge rounded-pill text-bg-light">Excel</span>
                            </a>

                            <a href="">
                                <span class="badge rounded-pill text-bg-light">Elequent </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // hanya ambil toast dari backend
            var toastElList = [].slice.call(document.querySelectorAll('.backend-toast'))
            
            toastElList.map(function (toastEl) {
                var toast = new bootstrap.Toast(toastEl)
                toast.show()
            })
        });
    </script>
@endpush
