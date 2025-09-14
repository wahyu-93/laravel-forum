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
                            {{-- edit dan delete jika sesuai dengan user yg login --}}
                            <div class="d-flex align-items-end justify-content-center justify-content-md-end gap-1">
                                
                            </div>
                            
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
                                    <div class="me-1 me-lg-2 d-flex flex-column gap-2">
                                        <div>
                                            <a href="{{ route('discussion.category', $discussion->category->slug) }}">
                                                <span class="badge rounded-pill text-bg-light ps-2">{{ $discussion->category->name }}</span>
                                            </a>

                                            @if ($discussion->status === 'updated')
                                                <span class="badge rounded-pill text-bg-light ps-2">Diedit oleh penulis {{ $discussion->updated_at->diffForHumans() }}</span>
                                            @endif
                                        </div>                                     

                                        <div class="d-flex flex-row gap-1 align-items-center p-1">
                                            {{-- tombol share --}}
                                            <a href="javascript:;" id="share-discussion" class="btn btn-info rounded-circle d-flex justify-content-center align-items-center p-0" style="width:25px; height:25px;" title="Share">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                                    <path d="M13.5 1a1.5 1.5 0 1 0 0 3   1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/>
                                                </svg>
                                            </a>

                                           <input type="text" id="current-url" value="{{ route('discussion.show', $discussion->slug) }}" class="d-none">

                                            @auth
                                                {{-- muncuk ketika user sesuai dengan yg membuat post --}}
                                                @if($discussion->user_id === Auth::user()->id)
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('discussion.edit', $discussion) }}" class="btn btn-light rounded-circle d-flex justify-content-center align-items-center p-0" style="width:25px; height:25px;" title="Edit" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                        </svg>
                                                    </a>
            
                                                    <!-- Tombol Delete -->
                                                    <form method="POST" action="{{ route('discussion.destroy', $discussion) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger rounded-circle d-flex justify-content-center align-items-center p-0" style="width:25px; height:25px;" title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
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