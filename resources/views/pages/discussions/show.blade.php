@extends('layouts.app')

@section('title','BeeForum - Discussions')

@section('body')
    <section class="bg-gray pt-4 pb-5 flex-grow-1">
        <div class="container">
            <div class="mb-4">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">Discussions</div>
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">></div>
                    </div>

                    <h2 class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions">
                        <div class="row">
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end justify-content-center">
                                <a href="">
                                    <img src="{{ url('assets/images/like.png') }}" alt="like" class="like-icon">
                                </a>

                                <span class="fs-4 color-gray mb-1">30</span>
                            </div>

                            <div class="col-12 col-lg-10">                            
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod veniam earum vel sint asperiores deleniti consequatur excepturi sequi architecto unde ad, animi velit error hic molestiae veritatis, itaque iusto voluptatum eveniet? Maiores facilis, quam illum culpa nemo tenetur magni necessitatibus rerum tempora aspernatur voluptate est reprehenderit exercitationem voluptatum maxime. Nisi.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptates non modi aliquid hic, sit similique, blanditiis pariatur, maxime a animi neque veritatis illo! Recusandae voluptas beatae in non incidunt?
                                    Lorem ipsum dolor sit amet.
                                </p>
                                
                                <div class="d-flex justify-content-between align-items-center text-start">
                                    <div class="me-1 me-lg-2 d-flex flex-column">
                                        <a href="#">
                                            <span class="badge rounded-pill text-bg-light ps-2">Laravel</span>
                                        </a>

                                        <span class="color-gray ps-2">
                                            <a href="javascript:;" id="share-discussion">
                                                <small>Share</small>
                                           </a>

                                           <input type="text" id="current-url" value="{{ route('discussions.show',['tes ']) }}" class="d-none">
                                        </span>
                                        
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflw-hidden">
                                            <a href="" class="">
                                                <img src="{{ url('assets/images/avatar-dummy.webp') }}" class="avatar rounded-circle">
                                            </a>
                                        </div>

                                        <span class="fs-12px d-flex flex-column">
                                            <a href="" class="me-1 fw-bold">Al Fatih</a>
                                            <span class="color-gray">
                                                10 Hours Ago
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mb-5">2 Answers</h3>

                    {{-- answer 1 --}}
                    <div class="card card-discussions">
                        <div class="row">
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end justify-content-center">
                                <a href="">
                                    <img src="{{ url('assets/images/like.png') }}" alt="like" class="like-icon">
                                </a>

                                <span class="fs-4 color-gray mb-1">30</span>
                            </div>

                            <div class="col-12 col-lg-10">                            
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam tenetur, magni eum fugit culpa cumque. Nesciunt doloremque ratione aliquid velit tempora officiis earum aperiam nihil nulla? Facilis non incidunt minus!
                                </p>
                                
                                <div class="d-flex justify-content-end align-items-center text-start">
                                    <div class="d-flex align-items-center">
                                        <div class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflw-hidden">
                                            <a href="" class="">
                                                <img src="{{ url('assets/images/avatar-dummy.webp') }}" class="avatar rounded-circle">
                                            </a>
                                        </div>

                                        <span class="fs-12px d-flex flex-column">
                                            <a href="" class="me-1 fw-bold">Wahyu</a>
                                            <span class="color-gray">
                                                8 Hours Ago
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- answer 2 --}}
                    <div class="card card-discussions">
                        <div class="row">
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end justify-content-center">
                                <a href="">
                                    <img src="{{ url('assets/images/like.png') }}" alt="like" class="like-icon">
                                </a>

                                <span class="fs-4 color-gray mb-1">10</span>
                            </div>

                            <div class="col-12 col-lg-10">                            
                                <p>
                                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, minima.
                                </p>
                                
                                <div class="d-flex justify-content-end align-items-center text-start">
                                    <div class="d-flex align-items-center">
                                        <div class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflw-hidden">
                                            <a href="" class="">
                                                <img src="{{ url('assets/images/avatar-dummy.webp') }}" class="avatar rounded-circle">
                                            </a>
                                        </div>

                                        <span class="fs-12px d-flex flex-column">
                                            <a href="" class="me-1 fw-bold">Shanum</a>
                                            <span class="color-gray">
                                                10 Hours Ago
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    <div class="text-center fw-bold">
                        Please 
                        <a href="{{ route('login') }}" class="text-decoration-underline text-primary">login</a> 
                        or 
                        <a href="{{ route('sign-up') }}" class="text-decoration-underline text-primary">create an account</a> 
                        to participate in this forum
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