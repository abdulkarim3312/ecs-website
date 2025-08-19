@extends('backend.layouts.master')

@section('styles')
<style>
    .big-checkbox {
        transform: scale(1.5); 
        -webkit-transform: scale(1.5); 
        margin: 5px;
        cursor: pointer;
    }
</style>
@endsection

@section('main-content')
<div class="page-container">
    <div class="page-title-box">
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="font-18 mb-0">Directory Category</h4>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Directory Category</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">
                        <i class="mdi mdi-clipboard-text-outline me-2 text-primary"></i> Directory Category List
                    </h4>
                    @can('create-directory')
                        <button type="button" id="addNew" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus-circle"></i> Add New
                        </button>
                    @endcan
                </div>
                <div class="card-body pt-2">
                    <table class="table table-bordered table-striped" id="responsive-datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="submitForm">
            @csrf
            <input type="hidden" name="id" id="rowId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Directory Category Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" id="name" name="category_name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-purple" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var dataTable = $('#responsive-datatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: true,
        responsive: true,
        ajax: '{{ route("directory.index") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', title: 'SL', orderable: false, searchable: false, className: 'text-start', titleClass: 'text-start' },
            { data: 'category_name', title: 'Category Name' },
            { data: 'action', title: 'Action', orderable: false, searchable: false }
        ]
    });

    $.modalCallBackOnAnyChange = function () {
        dataTable.draw(false);
    }


    $(document).ready(function () {

        $('#addNew').click(function () {
            $('#submitForm')[0].reset();
            $('#rowId').val('');
            $('.modal-title').text('Add New Category');
            $('#formModal').modal('show');

            // Clear previous errors
            $('.invalid-feedback').remove();
            $('.is-invalid').removeClass('is-invalid');
        });

        $(document).on('click', '.editBtn', function () {
            const id = $(this).data('id');
            const url = '{{ route("directory.edit", ":id") }}'.replace(':id', id);

            $.get(url, function (data) {
                $('#submitForm')[0].reset();
                $('#rowId').val(data.id);
                $('[name="category_name"]').val(data.category_name);
                $('.modal-title').text('Edit Category');
                $('#formModal').modal('show');

                // Clear previous errors
                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');
            });
        });

        $('#submitForm').submit(function (e) {
            e.preventDefault();
            const id = $('#rowId').val();
            const url = id
                ? '{{ route("directory.update", ":id") }}'.replace(':id', id)
                : '{{ route("directory.store") }}';

            const method = id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: method,
                data: $(this).serialize(),
                success: function (response) {
                    $('#formModal').modal('hide');
                    $('#submitForm')[0].reset();
                    dataTable.draw(false);
                    toastr.success(response.message);
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON?.errors;
                    
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');

                    if (errors) {
                        $.each(errors, function (field, messages) {
                            let input = $('[name="' + field + '"]');
                            
                            input.addClass('is-invalid');

                            if (input.next('.invalid-feedback').length === 0) {
                                input.after('<div class="invalid-feedback">' + messages[0] + '</div>');
                            }
                        });
                    } else {
                        toastr.error('An unexpected error occurred.');
                    }
                }
            });
        });

        $('#formModal').on('hidden.bs.modal', function () {
            $('#submitForm')[0].reset();
            $('#rowId').val('');
            $('.invalid-feedback').remove();
            $('.is-invalid').removeClass('is-invalid');
        });

        $(document).on('submit', '.delete-form', function (e) {
            e.preventDefault();

            const form = this;
            const id = $(form).data('id');
            const name = $(form).data('name') || 'this item';
            const url = '{{ route("directory.destroy", ":id") }}'.replace(':id', id);

            Swal.fire({
                title: 'Are you sure?',
                html: `You are about to delete <strong>${name}</strong> (ID: ${id}).`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: { _token: '{{ csrf_token() }}' },
                        success: function (response) {
                            dataTable.draw(false);
                            toastr.success(response.message);
                        },
                        error: function () {
                            Swal.fire('Error', 'Failed to delete the project.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
