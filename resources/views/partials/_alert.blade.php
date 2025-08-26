{{-- <div id="alert" class="alert alert-success mb-0 rounded-0 d-none">
    <div class="container">

    </div>
</div> --}}


{{-- <div id="alert" class="alert alert-success mb-3 rounded shadow-lg alert-dismissible fade show d-none" 
     style="max-width: 500px; margin: 20px auto;">
    <div class="d-flex align-items-center">
        <i class="bi bi-check-circle-fill me-2"></i>
        <span class="message">Link copied successfully!</span>
    </div>
    <!-- Tombol close -->
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> --}}

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