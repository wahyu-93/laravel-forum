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

                    <h2 class="mb-0">{{ $discussion->title }}</h2>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions">
                        <div class="row">
                            <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-center justify-content-center">
                                <a href="javascript:;" 
                                    id="discussion-like" 
                                    data-liked="{{ $discussion->liked() }}"
                                    data-like-url="{{ route('discussion.like', $discussion->slug) }}"
                                    data-unlike-url="{{ route('discussion.unlike', $discussion->slug) }}"
                                    data-like-icon="{{ $likedImage }}"
                                    data-unlike-icon="{{ $likeImage }}">
                                        <img src="{{ $discussion->liked() ? $likedImage : $likeImage }}" alt="like" class="like-icon" id="discussion-like-icon">
                                </a>

                                <span id="discussion-like-count" class="fs-4 color-gray mb-1 text-center">{{ $discussion->likeCount }}</span>
                            </div>

                            <div class="col-12 col-lg-10">                            
                                <p>
                                   {!! $discussion->content !!}
                                </p>
                                
                                <div class="d-flex justify-content-between align-items-center text-start">
                                    <div class="me-1 me-lg-2 d-flex flex-column">
                                        <a href="{{ route('discussion.category', $discussion->category->slug) }}">
                                            <span class="badge rounded-pill text-bg-light ps-2">{{ $discussion->category->name }}</span>
                                        </a>

                                        <span class="color-gray ps-2">
                                            <a href="javascript:;" id="share-discussion">
                                                <small>Share</small>
                                            </a>

                                           <input type="text" id="current-url" value="{{ route('discussion.show', $discussion->slug) }}" class="d-none">
                                        </span>
                                        
                                    </div>

                                    <div class="d-flex align-items-center gap-2">
                                        <div class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflw-hidden">
                                            <a href="">
                                                @if($discussion->user->image)
                                                    <img src="{{ storage($discussion->user->image) }}" class="avatar rounded-circle">
                                                @else
                                                    <img src="https://ui-avatars.com/api/?name={{ $discussion->user->name }}" class="avatar rounded-circle">
                                                @endif
                                            </a>
                                        </div>

                                        <span class="fs-12px d-flex flex-column">
                                            <a href="" class="me-1 fw-bold">{{ $discussion->user->name }}</a>
                                            <span class="color-gray">
                                                {{ $discussion->created_at->diffForHumans() }}
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
                        <a href="{{ route('register') }}" class="text-decoration-underline text-primary">create an account</a> 
                        to participate in this forum
                    </div>
                </div>


                <div class="col-12 col-lg-4">
                    <div class="card">
                        <h3>All Categories</h3>
                        <div>
                            @forelse ($categories as $category)
                                <a href="{{ route('discussion.category', $category->slug) }}">
                                    <span class="badge rounded-pill text-bg-light">{{ $category->name }}</span>
                                </a>
                            @empty
                                curently no categories yet
                            @endforelse
                            
                            <a href="{{ route('discussion.index') }}">
                                <span class="badge rounded-pill text-bg-light">All Category</span>
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

            $('#discussion-like').click(function(){
                // cek isi data-liked
                var isLiked = $(this).data('liked');
                var likeIcon = $(this).data('like-icon')
                var unLikeIcon = $(this).data('unlike-icon')

                // cek isi isLiked kalo isinya ada isi routenya unlike, kalo kosong isi routenya like
                var likeRoute = isLiked ? $(this).data('unlike-url') : $(this).data('like-url');

                  $.ajax({
                    method : 'POST',
                    url : likeRoute,
                    data : {
                        '_token' : '{{ csrf_token() }}'
                    }
                })
                .done(function(res){
                    console.log(res)
                    if(res.status === 'success'){
                        $('#discussion-like-count').text(res.data.likeCount);

                        if(isLiked){
                            $('#discussion-like-icon').attr('src', unLikeIcon)
                        }
                        else {
                            $('#discussion-like-icon').attr('src', likeIcon)
                        }

                        $('#discussion-like').data('liked', !isLiked)
                    }
                })
                .fail(function(xhr, status, error) {
                    // Debugging
                    console.error('AJAX Error:', status, error);

                    // ganti text dalam toast
                    $('.toast-body').text('Anda Belum Login');

                    // tampil toast
                    var toastEl = document.getElementById('alert');
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();

                    // redirect ke login
                    setTimeout(function() {
                        window.location.href = "{{ route('login') }}";
                    }, 2000);
                })
            })
        })
    </script>
@endpush