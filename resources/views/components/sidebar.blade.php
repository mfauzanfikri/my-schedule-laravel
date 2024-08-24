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

        <li class="nav-heading">Resource Management</li>

        <li class="nav-item">
            <x-nav-link href="/users" :active="request()->is('users')">
                <x-slot:icon>
                    <i class="bi bi-person"></i>
                </x-slot:icon>

                User
            </x-nav-link>
        </li>

        <li class="nav-item">
            <x-nav-link href="/departments" :active="request()->is('departments')">
                <x-slot:icon>
                    <i class="bi bi-building"></i>
                </x-slot:icon>

                Department
            </x-nav-link>
        </li>

        <li class="nav-item">
            <x-nav-link href="/employee-positions" :active="request()->is('employee-positions')">
                <x-slot:icon>
                    <i class="bi bi-person-badge"></i>
                </x-slot:icon>

                Employee Position
            </x-nav-link>
        </li>

        <li class="nav-heading">Pages</li>

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
