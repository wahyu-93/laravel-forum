@extends('layouts.app')

@section('title','BeeForum - Profile')

@section('body')
     <section class="bg-gray pt-4 pb-5 flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="avatar-wrapper d-flex align-items-center">
                                <a href="" class="me-1">
                                    <img src="{{ url('assets/images/avatar-dummy.webp') }}" class="avatar rounded-circle">
                                </a>
                            </div>

                            <div class="ms-2">
                                <h5 href="" class="me-1 fw-bold">Wahyu</h5>
                                <p class="color-gray">Member since 1 Year Ago</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="javascript:;" id="share-discussion" class="btn btn-primary">
                            Share
                        </a>

                        <input type="text" id="current-url" value="" class="d-none">

                        <a href="" class="btn btn-secondary">Edit Profile</a>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="mb-3">
                        <h2 class="fw-bold">My Discussions</h2>

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

                    <div>
                        <h2>My Answers</h2>

                        {{-- answer 1 --}}
                        <div class="card card-discussions">
                            <div class="row">
                                <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                    <div class="text-nowrap me-2 me-lg-0">
                                        7 likes
                                    </div>
                                </div>

                                <div class="col-12 col-lg-10">
                                    <span>Replied to</span>

                                    <span class="fw-bold text-primary">
                                        <a href="">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, itaque!
                                        </a>    
                                    </span> 
                                </div>
                            </div>
                        </div>

                        {{-- answer 2 --}}
                        <div class="card card-discussions">
                            <div class="row">
                                <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                    <div class="text-nowrap me-2 me-lg-0">
                                        8 likes
                                    </div>
                                </div>

                                <div class="col-12 col-lg-10">
                                    <span>Replied to</span>

                                    <span class="fw-bold text-primary">
                                        <a href="">
                                            Lorem ipsum dolor sit amet.
                                        </a>    
                                    </span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-script')
    <script>
        $(document).ready(function(){
            $('#share-discussion').click(function(){
                var copyText = $('#current-url');

                // sorot semua teks dalam inputan
                copyText[0].select();

                // tentukan rentang teksya yang maun disorot
                copyText[0].setSelectionRange(0, copyText.val().length);

                navigator.clipboard.writeText(copyText.val());
                
                // ganti text dalam toast
                $('.toast-body').text('Link copied successfully!');

                // tampil toast
                var toastEl = document.getElementById('alert');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();

                // var alert = $('#alert');
                // alert.removeClass('d-none');

                // var alertContaoner = alert.find('.container');
                // alertContaoner.first().text('link to this discussion copied successfully');
            })
        })
    </script>
@endpush