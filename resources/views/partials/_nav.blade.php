<nav class="navbar navbar-expand-lg" style="background-color:#5aa7ff;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold text-dark" href="#">
            <img class="h-48px" src="{{ asset('assets/images/logo-hitam.png') }}" alt="Logo">
        </a>

        <!-- Toggle button kalau layar kecil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-3 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('discussions.index') }}">Discussions</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            </ul>

            <!-- Search -->
            <form class="d-flex mx-3 flex-grow-1 mb-3 mb-lg-0" role="search">
                <div class="input-group">
                    <span class="input-group-text" id="search-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </span>
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </div>
            </form>

            <!-- Tombol -->
            <div class="d-flex gap-2 ms-auto">
                <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                <a href="{{ route('sign-up') }}" class="btn btn-primary">Sign Up</a>
            </div>
        </div>
    </div>
</nav>