@extends('layouts.adminApp')

@section('title', 'Users')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>List Users</h2>
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
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                                {{ $user->name }}

                                @if($user->actived)
                                    <span class="badge bg-primary">Active</span>
                                @else
                                    <span class="badge bg-danger">Suspend</span>
                                @endif
                            </td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                 @if($user->image)
                                    <img src="{{  Storage::url($user->image) }}" class="rounded-circle" width="35px" height="35px">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ $user->name }}" class="rounded-circle" width="35px" height="35px">
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td class="text-center">
                                <div class="d-flex gap-1">
                                    @if($user->actived)
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalPublish{{ $user->id }}" title="suspend">
                                            <i class="bi bi-pause"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modalPublish{{ $user->id }}" title="active kan">
                                            <i class="bi bi-play"></i>
                                        </button>
                                    @endif

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $user->id }}" title="delete">
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

    @include('admin.user._delete')
    @include('admin.user._suspend')
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