@extends('layouts.app')

@section('title','BeeForum - Discussions')

@section('body')
    <section class="bg-gray pt-4 pb-5 flex-grow-1">
        <div class="container">
            <div class="mb-4">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h2 class="me-4 mb-0">
                        @if (isset($search))
                            Search Results For "{{ $search }}"
                        @else 
                            All Discussions  @if(isset($categorySelect)) about "{{ $categorySelect->name }}" @endif
                        @endif
                    </h2>
                    
                    <div>
                        {{ $discussions->total() . ' ' . Str::plural('Discussion', $discussions->total())}}
                    </div>
                </div>

                @auth
                    <a href="{{ route('discussion.create') }}" class="btn btn-primary">Create New Discussion</a>
                @endauth
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    @forelse ($discussions as $discussion)
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
                                                <a href="" class="me-1">
                                                    @if($discussion->user->image)
                                                        <img src="{{ storage($discussion->user->image) }}" class="avatar rounded-circle">
                                                    @else
                                                        <img src="https://ui-avatars.com/api/?name={{ $discussion->user->name }}" class="avatar rounded-circle">
                                                    @endif
                                                </a>
                                            </div>

                                            <span class="fs-12px">
                                                <a href="" class="me-1 fw-bold">{{ $discussion->user->username }}</a>
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
                            curently no discussions yet
                        </div>    
                    @endforelse

                   {{ $discussions->links() }}

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
