@extends('layouts.app')

@section('title','BeeForum - Answer')

@section('body')
    <div class="bg-gray pt-5 pb-5 flex-grow-1">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold me-2 mb-0">
                            Edit Answer
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('answer.update', $answer) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group mb-3">
                                        <label for="answer" class="form-label">Answer</label>
                                        
                                        <textarea name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror" cols="30" rows="10">{!! $answer->answer !!}</textarea>
                                        @error('answer')
                                           <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    

                                    <div>
                                        <button type="submit" class="btn btn-primary">Update Answer</button>
                                        <a href="{{ route('discussion.show', $answer->discussion->slug) }}" class="btn btn-secondary">Cancel</a>
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
        $('#answer').summernote({
            placeholder: 'Your Solution',
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