@extends('layouts.app')

@section('title','BeeForum - Discussions')

@section('body')
    <div class="bg-gray pt-5 pb-5 flex-grow-1">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold me-2 mb-0">
                            Edit a Question
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('discussion.update', $discussion) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $discussion->title ?? old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                            <option value="" disabled selected>Select Category</option>

                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $discussion->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach()
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="content" class="form-label">Content</label>

                                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10">{!! $discussion->content !!}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary">Update Question</button>
                                        <a href="{{ route('discussion.index') }}" class="btn btn-secondary">Cancel</a>
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