@extends('layouts.app')

@section('title','BeeForum - Profile')

@section('body')
     <section class="bg-gray pt-4 pb-5 flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <form action="" method="POST">
                        <div class="d-flex flex-column flex-md-row mb-4">
                            <div class="edit-avatar-wrapper mb-3 mb-md-0 mx-auto mx-md-0">
                                <div class="avatar-wrapper d-flex align-items-center">
                                    <a href="" class="me-1">
                                        <img src="{{ url('assets/images/avatar-dummy.webp') }}" class="avatar rounded-circle" id="avatar">
                                    </a>
                                </div>

                                <label for="picture" class="btn p-0 edit-avatar-show">
                                    <img src="{{ url('assets/images/edit-circle.png') }}" alt="edit">
                                </label>
                                <input type="file" name="picture" id="picture" class="d-none" accept="image/*">
                            </div>

                            <div class="ms-4">
                                <div class="form-group mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="pasword" name="password" id="password" class="form-control">
                                    <span class="color-gray fst-italic">
                                        *empty this if you don't want to change password
                                    </span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <input type="pasword" name="confirmPassword" id="confirmPassword" class="form-control">
                                    <span class="color-gray fst-italic">
                                        *empty this if you don't want to change password
                                    </span>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-script')
    <script>
        $('#picture').on('change', function(event){
            var output = $('#avatar');
            
            output.attr('src', URL.createObjectURL(event.target.files[0]));
            output.onload = function() {
                URL.revokeObjectURL(output.attr('src'))
            }
        })
    </script>
@endpush