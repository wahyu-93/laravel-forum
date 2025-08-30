@extends('layouts.app')

@section('body')
    <div class="bg-gray pt-5 pb-5 flex-grow-1">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold me-2 mb-0">
                            Ask a Question
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="post">
                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option value="">Elequent ORM</option>
                                            <option value="">Facades</option>
                                            <option value="">Helper</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary">Create Question</button>
                                        <a href="" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $('#content').summernote({
            placeholder: 'the details of your problem | what did you try | what you were expecting  ',
            tabsize: 2,
            height: 320,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview', 'help']]
            ]
        });

        $('span.note-icon-caret').remove();
    </script>
@endpush