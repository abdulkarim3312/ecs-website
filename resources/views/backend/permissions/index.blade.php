@extends('backend.layouts.master')

@section('styles')
<style>
    
</style>
@endsection

@section('main-content')
<div class="page-container">
    <div class="page-title-box">
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="font-18 mb-0">Data Tables</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                    
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    
                    <li class="breadcrumb-item active">Data Tables</li>
                </ol>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">
                        <i class="fa-solid fa-users me-2 text-primary"></i>
                        Permission List
                    </h4>

                    <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">
                        <span class="mdi mdi-plus-circle"></span> Add New 
                    </a>
                </div>
                <div class="card-body pt-2">
                    <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-start">SL No</th>
                                <th>Name</th>
                                <th>Web Guard</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td class="text-start">{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                        <td>
                                            @can('edit permissions')
                                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-primary text-white edit_btn">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('delete permissions')
                                                <button class="btn btn-danger btn-sm deleteItem" data-id="{{ $permission->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endcan
                                            <form id="deleteForm{{ $permission->id }}" action="{{route('permissions.destroy', $permission->id)}}" method="post" style="display:none">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                                        class="icofont icofont-check"></i> Confirm Delete</button>
                                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                                        class="fa fa-times"></i> Cancel</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end row -->
</div> <!-- container -->
@endsection
@section('scripts')
<script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                lengthChange: true,
                ordering: true,
                language: {
                    searchPlaceholder: "Search users...",
                    search: "",
                }
            });
        })

        $('.deleteItem').on('click',function(){
            let id = $(this).data('id')
            swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.value) {
                    $("#deleteForm"+id).submit();
                }
            })
        });
    </script>
@endsection
