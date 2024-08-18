<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">User List</h5>
                            <div class="d-flex align-items-center">
                                <button type="button" id="create-btn" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#create-modal">
                                    Create
                                </button>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <p class="mb-0">{{ session()->get('success') }}</p>
                            </div>
                        @endif

                        @if (session()->has('warning'))
                            <div class="alert alert-warning">
                                <p class="mb-0">{{ session()->get('warning') }}</p>
                            </div>
                        @endif

                        <div>
                            <table id="user-table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        @if ($user->userRole->name === 'admin')
                                            @continue
                                        @endif
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="d-flex gap-1 justify-content-center">
                                                    <button type="button" class="btn btn-warning edit-btn"
                                                        data-bs-toggle="modal" data-bs-target="#edit-modal"
                                                        data-id="{{ $user->id }}"
                                                        data-username="{{ $user->username }}"
                                                        data-email="{{ $user->email }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger delete-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete-modal"
                                                        data-id="{{ $user->id }}"
                                                        data-username="{{ $user->username }}">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Create Modal -->
    <div class="modal fade" id="create-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/users/store" autocomplete="off" method="POST">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column gap-3">
                            <div>
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="username" maxlength="20" required>
                            </div>
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="name@example.com" maxlength="50" required>
                            </div>
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    maxlength="10" autocomplete="new-password" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary" disabled>Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/users/update" method="POST" autocomplete="off">
                @csrf

                <input type="hidden" name="id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column gap-3">
                            <div>
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="username">
                            </div>
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="name@example.com">
                            </div>
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    maxlength="10" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary" disabled>Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" autocomplete="off">
                @csrf
                <input type="hidden" name="id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete user with username of <strong id="tobe-deleted-info"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot:script>
        <script>
            $('#user-table').DataTable({
                order: []
            });
        </script>

        <script src="/assets/vendor/validator/validator.min.js"></script>

        <script>
            // create modal
            const createModalForm = $('#create-modal form');
            const createModalButton = $('#create-btn');
            const createModalSubmitButton = $('#create-modal form button[type="submit"]');

            const createUserData = {
                username: null,
                email: null,
                password: null
            };

            createModalButton.on('click', () => {
                createModalForm[0].reset();

                if (createUserData.username || createUserData.email || createUserData.password) {
                    createUserData.username = null;
                    createUserData.email = null;
                    createUserData.password = null;
                }
            });

            createModalForm.on('change', () => {
                if (createUserData.username && createUserData.email && createUserData.password) {
                    createModalSubmitButton.removeAttr('disabled');
                } else {
                    createModalSubmitButton.attr('disabled', 'true');
                }
            });

            createModalForm.on('reset', () => {
                createUserData.username = null;
                createUserData.email = null;
                createUserData.password = null;

                createModalSubmitButton.attr('disabled', 'true');
            });

            $('#create-modal form input[name="username"]').on('change', (e) => {
                const value = e.target.value.trim();

                if (value === '') {
                    createUserData.username = null;

                    return;
                }

                createUserData.username = value;
                e.target.value = value;
            });

            $('#create-modal form input[name="email"]').on('change', (e) => {
                const value = e.target.value.trim();

                if (value === '' || !validator.isEmail(value)) {
                    createUserData.email = null;
                    createModalSubmitButton.attr('disabled', 'true');

                    return;
                }

                createUserData.email = value;
            });

            $('#create-modal form input[name="password"]').on('change', (e) => {
                const value = e.target.value;

                if (value === '') {
                    createUserData.password = null;
                    createModalSubmitButton.attr('disabled', 'true');

                    return;
                }

                createUserData.password = value;
            });
        </script>

        <script>
            // edit modal
            const editModalForm = $('#edit-modal form');
            const editModalButton = $('.edit-btn');
            const editModalSubmitButton = $('#edit-modal form button[type="submit"]');

            const editIdInput = $('#edit-modal form input[name="id"]');
            const editUsernameInput = $('#edit-modal form input[name="username"]');
            const editEmailInput = $('#edit-modal form input[name="email"]');
            const editPasswordInput = $('#edit-modal form input[name="password"]');

            const editUserData = {
                username: null,
                email: null,
                password: null
            };

            editModalButton.on('click', ({
                target
            }) => {
                editModalForm[0].reset();

                if (editUserData.username || editUserData.email || password.null) {
                    editUserData.username = null;
                    editUserData.email = null;
                    editUserData.password = null;
                }

                const id = editModalButton.data('id');
                const username = editModalButton.data('username');
                const email = editModalButton.data('email');

                editIdInput.val(id);
                editUsernameInput.attr('placeholder', username);
                editEmailInput.attr('placeholder', email);
            });

            editModalForm.on('change', () => {
                if (editUserData.username || editUserData.email || editUserData.password) {
                    editModalSubmitButton.removeAttr('disabled');
                } else {
                    editModalSubmitButton.attr('disabled', 'true');
                }
            });

            editModalForm.on('reset', () => {
                editUserData.username = null;
                editUserData.email = null;
                editUserData.password = null;

                editModalSubmitButton.attr('disabled', 'true');
            });

            editUsernameInput.on('change', ({
                target
            }) => {
                const value = target.value.trim();

                if (value === '') {
                    editUserData.username = null;

                    return;
                }

                editUserData.username = value;
            });

            editEmailInput.on('change', ({
                target
            }) => {
                const value = target.value.trim();

                if (value === '' || !validator.isEmail(value)) {
                    editUserData.email = null;

                    return;
                }

                editUserData.email = value;
            });

            editPasswordInput.on('change', ({
                target
            }) => {
                const value = target.value;

                if (value === '') {
                    editUserData.password = null;

                    return;
                }

                editUserData.password = value;
            });
        </script>

        <script>
            // delete modal
            const deleteModalButton = $('.delete-btn');
            const deleteIdInput = $('#delete-modal form input[name="id"]');

            deleteModalButton.on('click', () => {
                const id = deleteModalButton.data('id');
                const username = deleteModalButton.data('username')

                deleteIdInput.val(id);

                $('#tobe-deleted-info').text(username);
            });
        </script>
    </x-slot:script>
</x-layout>
