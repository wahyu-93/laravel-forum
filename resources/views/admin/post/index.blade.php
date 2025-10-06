@extends('layouts.adminApp')

@section('title', 'Discussion')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>List Discussions</h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  
        <div class="mt-3">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Content Preview</th>
                        <th>Created At</th>
                        <th>User</th>
                        <th>Comments</th>
                        <th>Likes</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $post->title }}

                                <span class="badge bg-primary">{{ $post->category->name }}</span>
                            </td>
                            <td>{!! $post->content_preview !!}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->user->name }} ({{ $post->user->username }})</td>
                            <td class="text-center">
                                <span class="badge bg-info">{{ $post->answers->count() }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-info">{{ $post->likeCount }}</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex gap-1">
                                    @if($post->published)
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalPublish{{ $post->id }}" title="unpublish">
                                            <i class="bi-file-earmark-text"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modalPublish{{ $post->id }}" title="published">
                                            <i class="bi bi-send"></i>
                                        </button>
                                    @endif

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $post->id }}" title="delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    @include('admin.post._delete')
    @include('admin.post._published')
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function(){
            $('#dataTable').DataTable()
        })
    </script>
@endpush