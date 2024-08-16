<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <x-nav-link href="/" :active="request()->is('/')">
                <x-slot:icon>
                    <i class="bi bi-grid"></i>
                </x-slot:icon>

                Dashboard
            </x-nav-link>
        </li>

        <li class="nav-item">
            <x-nav-link href="/users" :active="request()->is('users')">
                <x-slot:icon>
                    <i class="bi bi-person"></i>
                </x-slot:icon>

                Users
            </x-nav-link>
        </li>

        <li class="nav-item">
            <x-nav-link href="/logout" :active="false">
                <x-slot:icon>
                    <i class="bi bi-box-arrow-left"></i>
                </x-slot:icon>

                Logout
            </x-nav-link>
        </li>

    </ul>

</aside><!-- End Sidebar-->
