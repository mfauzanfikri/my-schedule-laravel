<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Department</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Department List</h5>
                            <div class="d-flex align-items-center">
                                <button type="button" id="create-btn" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#create-modal">
                                    Create
                                </button>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p class="mb-0">{{ session()->get('success') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('warning'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <p class="mb-0">{{ session()->get('warning') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <p class="mb-0">{{ session()->get('error') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div>
                            <table id="department-table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr>
                                            <td>{{ Str::title($department->name) }}</td>
                                            <td>
                                                <div class="d-flex gap-1 justify-content-center">
                                                    <button type="button" class="btn btn-warning edit-btn"
                                                        data-bs-toggle="modal" data-bs-target="#edit-modal"
                                                        data-id="{{ $department->id }}"
                                                        data-name="{{ Str::title($department->name) }}"> Edit </button>
                                                    <button type="button" class="btn btn-danger delete-btn"
                                                        data-bs-toggle="modal" data-bs-target="#delete-modal"
                                                        data-id="{{ $department->id }}"
                                                        data-name="{{ Str::title($department->name) }}">
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
            <form action="/departments/store" method="POST" autocomplete="off">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Department</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column gap-3">
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="name" maxlength="20" required>
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
            <form action="/departments/update" method="POST" autocomplete="off">
                @csrf

                <input type="hidden" name="id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Department</h1>
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
            <form action="/departments/delete" method="POST" autocomplete="off">
                @csrf
                <input type="hidden" name="id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Department</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete department with name of <strong id="tobe-deleted-info"></strong>?</p>
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
            $('#department-table').DataTable({
                order: []
            });
        </script>

        <script src="/assets/vendor/validator/validator.min.js"></script>

        <script>
            // create modal
            const createModalForm = $('#create-modal form');
            const createModalButton = $('#create-btn');
            const createModalSubmitButton = $('#create-modal form button[type="submit"]');

            const createDepartmentData = {
                name: null,
            };

            createModalButton.on('click', () => {
                createModalForm[0].reset();

                if (createDepartmentData.name) {
                    createDepartmentData.name = null;
                }
            });

            createModalForm.on('change', () => {
                if (createDepartmentData.name) {
                    createModalSubmitButton.removeAttr('disabled');
                } else {
                    createModalSubmitButton.attr('disabled', 'true');
                }
            });

            createModalForm.on('reset', () => {
                createDepartmentData.name = null;

                createModalSubmitButton.attr('disabled', 'true');
            });

            $('#create-modal form input[name="name"]').on('change', (e) => {
                const value = e.target.value.trim();

                if (value === '') {
                    createDepartmentData.name = null;

                    return;
                }

                createDepartmentData.name = value;
                e.target.value = value;
            });
        </script>

        <script>
            // edit modal
            const editModalForm = $('#edit-modal form');
            const editModalButton = $('.edit-btn');
            const editModalSubmitButton = $('#edit-modal form button[type="submit"]');

            const editIdInput = $('#edit-modal form input[name="id"]');
            const editNameInput = $('#edit-modal form input[name="name"]');

            const editDepartmentData = {
                name: null,
            };

            editModalButton.on('click', ({
                target
            }) => {
                editModalForm[0].reset();

                if (editDepartmentData.name) {
                    editDepartmentData.name = null;
                }

                const id = editModalButton.data('id');
                const name = editModalButton.data('name');

                editIdInput.val(id);
                editNameInput.attr('placeholder', name);
            });

            editModalForm.on('change', () => {
                if (editDepartmentData.name) {
                    editModalSubmitButton.removeAttr('disabled');
                } else {
                    editModalSubmitButton.attr('disabled', 'true');
                }
            });

            editModalForm.on('reset', () => {
                editDepartmentData.name = null;

                editModalSubmitButton.attr('disabled', 'true');
            });

            editNameInput.on('change', ({
                target
            }) => {
                const value = target.value.trim();

                if (value === '') {
                    editDepartmentData.name = null;

                    return;
                }

                editDepartmentData.name = value;
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
