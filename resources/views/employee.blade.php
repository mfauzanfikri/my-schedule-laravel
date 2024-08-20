<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Employee</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Employee List</h5>
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
                            <table id="employee-table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        @if ($employee->employeeRole->name === 'admin')
                                            @continue
                                        @endif
                                        <tr>
                                            <td>{{ $employee->name }}</td>
                                            <td>
                                                <div class="d-flex gap-1 justify-content-center">
                                                    <button type="button" class="btn btn-warning edit-btn"
                                                        data-bs-toggle="modal" data-bs-target="#edit-modal"
                                                        data-id="{{ $employee->id }}" data-name="{{ $employee->name }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger delete-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete-modal"
                                                        data-id="{{ $employee->id }}" data-name="{{ $employee->name }}">
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
            <form action="/employees/store" autocomplete="off" method="POST">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column gap-3">
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="name" maxlength="20" required>
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
            <form action="/employees/update" method="POST" autocomplete="off">
                @csrf

                <input type="hidden" name="id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column gap-3">
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="name">
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete employee with name of <strong id="tobe-deleted-info"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot:script>
        <script>
            $('#employee-table').DataTable({
                order: []
            });
        </script>

        <script src="/assets/vendor/validator/validator.min.js"></script>

        <script>
            // create modal
            const createModalForm = $('#create-modal form');
            const createModalButton = $('#create-btn');
            const createModalSubmitButton = $('#create-modal form button[type="submit"]');

            const createEmployeeData = {
                name: null,
                email: null,
                password: null
            };

            createModalButton.on('click', () => {
                createModalForm[0].reset();

                if (createEmployeeData.name || createEmployeeData.email || createEmployeeData.password) {
                    createEmployeeData.name = null;
                    createEmployeeData.email = null;
                    createEmployeeData.password = null;
                }
            });

            createModalForm.on('change', () => {
                if (createEmployeeData.name && createEmployeeData.email && createEmployeeData.password) {
                    createModalSubmitButton.removeAttr('disabled');
                } else {
                    createModalSubmitButton.attr('disabled', 'true');
                }
            });

            createModalForm.on('reset', () => {
                createEmployeeData.name = null;
                createEmployeeData.email = null;
                createEmployeeData.password = null;

                createModalSubmitButton.attr('disabled', 'true');
            });

            $('#create-modal form input[name="name"]').on('change', (e) => {
                const value = e.target.value.trim();

                if (value === '') {
                    createEmployeeData.name = null;

                    return;
                }

                createEmployeeData.name = value;
                e.target.value = value;
            });

            $('#create-modal form input[name="email"]').on('change', (e) => {
                const value = e.target.value.trim();

                if (value === '' || !validator.isEmail(value)) {
                    createEmployeeData.email = null;
                    createModalSubmitButton.attr('disabled', 'true');

                    return;
                }

                createEmployeeData.email = value;
            });

            $('#create-modal form input[name="password"]').on('change', (e) => {
                const value = e.target.value;

                if (value === '') {
                    createEmployeeData.password = null;
                    createModalSubmitButton.attr('disabled', 'true');

                    return;
                }

                createEmployeeData.password = value;
            });
        </script>

        <script>
            // edit modal
            const editModalForm = $('#edit-modal form');
            const editModalButton = $('.edit-btn');
            const editModalSubmitButton = $('#edit-modal form button[type="submit"]');

            const editIdInput = $('#edit-modal form input[name="id"]');
            const editNameInput = $('#edit-modal form input[name="name"]');
            const editEmailInput = $('#edit-modal form input[name="email"]');
            const editPasswordInput = $('#edit-modal form input[name="password"]');

            const editEmployeeData = {
                name: null,
                email: null,
                password: null
            };

            editModalButton.on('click', ({
                target
            }) => {
                editModalForm[0].reset();

                if (editEmployeeData.name || editEmployeeData.email || password.null) {
                    editEmployeeData.name = null;
                    editEmployeeData.email = null;
                    editEmployeeData.password = null;
                }

                const id = editModalButton.data('id');
                const name = editModalButton.data('name');
                const email = editModalButton.data('email');

                editIdInput.val(id);
                editNameInput.attr('placeholder', name);
                editEmailInput.attr('placeholder', email);
            });

            editModalForm.on('change', () => {
                if (editEmployeeData.name || editEmployeeData.email || editEmployeeData.password) {
                    editModalSubmitButton.removeAttr('disabled');
                } else {
                    editModalSubmitButton.attr('disabled', 'true');
                }
            });

            editModalForm.on('reset', () => {
                editEmployeeData.name = null;
                editEmployeeData.email = null;
                editEmployeeData.password = null;

                editModalSubmitButton.attr('disabled', 'true');
            });

            editNameInput.on('change', ({
                target
            }) => {
                const value = target.value.trim();

                if (value === '') {
                    editEmployeeData.name = null;

                    return;
                }

                editEmployeeData.name = value;
            });

            editEmailInput.on('change', ({
                target
            }) => {
                const value = target.value.trim();

                if (value === '' || !validator.isEmail(value)) {
                    editEmployeeData.email = null;

                    return;
                }

                editEmployeeData.email = value;
            });

            editPasswordInput.on('change', ({
                target
            }) => {
                const value = target.value;

                if (value === '') {
                    editEmployeeData.password = null;

                    return;
                }

                editEmployeeData.password = value;
            });
        </script>

        <script>
            // delete modal
            const deleteModalButton = $('.delete-btn');
            const deleteIdInput = $('#delete-modal form input[name="id"]');

            deleteModalButton.on('click', () => {
                const id = deleteModalButton.data('id');
                const name = deleteModalButton.data('name')

                deleteIdInput.val(id);

                $('#tobe-deleted-info').text(name);
            });
        </script>
    </x-slot:script>
</x-layout>
