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
                        User List
                    </h4>

                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                        <span class="mdi mdi-plus-circle"></span> Add New 
                    </a>
                </div>
                <div class="card-body pt-2">
                    <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Last login</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name ?? ''}}</td>
                                        <td>{{ $user->email ?? ''}}</td>
                                        <td>{{ $user->user_type ?? ''}}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->setTimezone('Asia/Dhaka')->format('d-m-Y h:i:s A') : '' }}</td>
                                        <td>
                                            @can('edit users')
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary text-white edit_btn">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('delete users')
                                                <button class="btn btn-danger btn-sm deleteItem" data-id="{{ $user->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endcan
                                            <form id="deleteForm{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:none">
                                                @csrf
                                                @method('DELETE')
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
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.value) {
                    $("#deleteForm"+id).submit();
                }
            })
        });
    </script>
@endsection
