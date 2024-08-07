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
            <x-nav-link href="/" :active="request()->is('/user')">
                <x-slot:icon>
                    <i class="bi bi-grid"></i>
                </x-slot:icon>

                Dashboard
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
