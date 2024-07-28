@php
    $path = Request::path();
@endphp

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ $path === '/' ? '' : 'collapse' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <!-- logout -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/dashboard/logout">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->
