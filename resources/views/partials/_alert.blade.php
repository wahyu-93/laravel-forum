<div class="toast-container position-fixed top-0 end-0 p-3">

    {{-- Toast dari backend --}}
    @foreach (['success', 'error', 'warning', 'info'] as $msg)
        @if(session($msg))
            <div class="toast backend-toast align-items-center text-bg-{{ $msg == 'error' ? 'danger' : $msg }} border-0 mb-2"
                 role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session($msg) }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto"
                            data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
    @endforeach

    {{-- Toast untuk dipanggil dari JS --}}
    <div id="alert" 
        class="toast align-items-center text-bg-light border-0 position-fixed top-0 start-50 translate-middle-x mt-3"
        role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
        <div class="d-flex">
            <div class="toast-body">
                Link copied successfully!
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>

</div>



