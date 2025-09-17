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
                                    @if($user->image)
                                        <img src="{{ storage_path($user->image) }}" class="avatar-profile rounded-circle">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ $user->name }}" class="avatar-profile rounded-circle">
                                    @endif
                                </a>

                                
                            </div>

                            <div class="ms-2">
                                <h5 href="" class="me-1 fw-bold">{{ $user->name }}</h5>
                                <p class="color-gray">Member since {{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="javascript:;" id="share-discussion" class="btn btn-primary">
                            Share
                        </a>

                        <input type="text" id="current-url" value="" class="d-none">

                        @auth
                            @if(auth()->user()->username === $user->username)
                                <a href="" class="btn btn-secondary">Edit Profile</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="mb-3">
                        <h2 class="fw-bold">My Discussions</h2>

                        @forelse ($discussions as $discussion)
                            <div class="card card-discussions">
                                <div class="row">
                                    <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                        <div class="text-nowrap me-2 me-lg-0">
                                            {{ $discussion->likeCount . ' ' . Str::plural('Like', $discussion->likeCount) }} 
                                        </div>

                                        <div class="text-nowrap color-gray">
                                            {{ $discussion->answers->count() . ' ' . Str::plural('Answer', $discussion->answers->count()) }} 
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-10">
                                        <a href="{{ route('discussion.show', $discussion->slug) }}">
                                            <h4>{{ $discussion->title }}</h4>
                                        </a>
                                    
                                        <p>
                                             {!! $discussion->content_preview !!}
                                        </p>
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-1 me-lg-2">
                                                <a href="{{ route('discussion.category', $discussion->category->slug) }}">
                                                    <span class="badge rounded-fill text-bg-light">{{ $discussion->category->name }}</span>
                                                </a>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm-wrapper d-flex align-items-center">
                                                    <a href="{{ route('profile.index', $discussion->user->username) }}" class="me-1">
                                                        @if($discussion->user->image)
                                                            <img src="{{ storage_path($discussion->user->image) }}" class="avatar rounded-circle">
                                                        @else
                                                            <img src="https://ui-avatars.com/api/?name={{ $discussion->user->name }}" class="avatar rounded-circle">
                                                        @endif
                                                    </a>
                                                </div>

                                                <span class="fs-12px">
                                                    <a href="{{ route('profile.index', $discussion->user->username) }}" class="me-1 fw-bold">{{ $discussion->user->username }}</a>
                                                    <span class="color-gray">
                                                        {{ $discussion->created_at->diffForHumans() }}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card card-discussions">
                                Currently, there is no discussions yet 
                            </div>
                        @endforelse

                        {{ $discussions->appends(request()->except('discussions_page'))->links() }}

                    </div>

                    <div>
                        <h2>My Answers</h2>

                        @forelse ($answers as $answer)
                            <div class="card card-discussions">
                                <div class="row">
                                    <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                        <div class="text-nowrap me-2 me-lg-0">
                                            {{ $answer->likeCount . ' ' . Str::plural('Like', $answer->likeCount) }} 
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-10">
                                        <span>Replied to</span>

                                        <span class="fw-bold text-primary">
                                            <a href="{{ route('discussion.show', $answer->discussion->slug) }}">
                                                {{ $answer->discussion->title  }}
                                            </a>    
                                        </span> 
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card card-discussions">
                                Currently, there is no answers yet 
                            </div>
                        @endforelse

                        {{ $answers->appends(request()->except('answers_page'))->links() }}
                        
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