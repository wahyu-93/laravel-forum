<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/post*') ? 'active' : '' }}" href="{{ route('admin.post.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Discussions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>