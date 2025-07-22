@extends('backend.layouts.master')

@section('styles')
<style>
    .big-checkbox {
        transform: scale(1.5); 
        -webkit-transform: scale(1.5); 
        margin: 5px;
        cursor: pointer;
    }
    .custom-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
        }

        .custom-switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.3s;
        border-radius: 34px;
        }

        .slider::before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
        }

        .custom-switch input:checked + .slider {
        background-color: #4caf50;
        }

        .custom-switch input:checked + .slider::before {
        transform: translateX(20px);
        }

</style>
@endsection

@section('main-content')
<div class="page-container">
    <div class="page-title-box">
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="font-18 mb-0">Page </h4>
            </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Page List</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clipboard-text-outline me-2 text-primary fs-5"></i>
                        <span class="fw-bold me-3">Page List</span>
                    </div>

                    <a href="{{ route('page.create') }}" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-plus-circle"></i> Add New
                    </a>
                </div>
                <div class="card-body pt-2">
                    <table class="table table-bordered table-striped" id="responsive-datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Bangla Title</th>
                                <th>English Title</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
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
        ajax: '{{ route("page.index") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', title: 'SL', orderable: false, searchable: false, className: 'text-start', titleClass: 'text-start' },
            { data: 'bn_title', name: 'bn_title', width: '27%' },
            { data: 'en_title', name: 'en_title', width: '27%' },
            { data: 'url', name: 'url', width: '27%' },
            { data: 'action', title: 'Action', orderable: false, searchable: false }
        ]
    });

    $.modalCallBackOnAnyChange = function () {
        dataTable.draw(false);
    }


    $(document).ready(function () {

        $(document).on('submit', '.delete-form', function (e) {
            e.preventDefault();

            const form = this;
            const id = $(form).data('id');
            const name = $(form).data('name') || 'this item';
            const url = '{{ route("page.destroy", ":id") }}'.replace(':id', id);

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
                            Swal.fire('Error', 'Failed to delete the page.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
