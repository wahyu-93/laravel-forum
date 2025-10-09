@extends('layouts.adminApp')

@section('title', 'Admin Dashboard')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Dashboard Admin</h2>
        </div>

        <div class="d-flex flex-wrap gap-3 mb-3">
            <div class="card flex-fill">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <h3 class="card-text">{{ $usersCount }}</h3>

                </div>
            </div>

            <div class="card flex-fill">
                <div class="card-body">
                    <h5 class="card-title">Discussions</h5>
                    <h3 class="card-text">{{ $discussionsCount }}</h3>
                </div>
            </div>

            <div class="card flex-fill">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <h3 class="card-text">{{ $categoriesCount }}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- table 1 --}}
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Categroy</th>
                            <th>Total</th>
                        </tr>
                        
                        @forelse ($countDiscussionsByCategory as $discussion )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $discussion->name }}</td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $discussion->discussions_count }}
                                    </span>
                                </td>

                            </tr>
                        @empty
                            <p>Belum Ada Data</p>
                        @endforelse

                    </table>
                </div>   
            </div>

            {{-- table 2 --}}
             <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Discussion</th>
                            <th>Category</th>
                            <th>Total Answer</th>
                            <th>Total Like</th>
                        </tr>
                        
                        @forelse ($countDiscussionsByAnswer as $discussionAnswer )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $discussionAnswer->title }}</td>
                                <td>{{ $discussionAnswer->category->name }}</td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $discussionAnswer->answers_count }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $discussionAnswer->likeCount }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <p>Belum Ada Data</p>
                        @endforelse

                    </table>
                </div>   
            </div>
        </div>       

    </main>
@endsection