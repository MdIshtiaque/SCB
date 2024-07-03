@extends('layouts.main-layout')

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Sweet Alert -->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">User List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0 mb-3">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Management</a></li>
                                <li class="breadcrumb-item active">User List</li>
                            </ol>
                            <ol class="breadcrumb m-0 d-flex justify-content-end">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('user-management.add-new-user') }}" class="btn btn-primary waves-effect btn-label waves-light" style="color: white">
                                        <i class="bx bx-plus label-icon"></i> Add new user
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 text-center">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Active/Inactive</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <span class="badge rounded-pill {{ $user->role_id === 2 ? 'bg-success' : 'bg-primary' }}" style="font-size: small">{{ $user->role->name }}</span>
                                            </td>
                                            <td>
                                                <div class="square-switch">
                                                    <input type="checkbox" id="square-switch{{ $user->id }}" class="active-btn" switch="bool" {{ $user->is_active ? 'checked' : '' }}/>
                                                    <label for="square-switch{{ $user->id }}" data-on-label="on" data-off-label="off"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('user.edit', $user->id) }}" type="button" class="btn btn-dark btn-sm waves-effect waves-light">
                                                    <i class="mdi mdi-pencil d-block font-size-16"></i>
                                                </a>
                                                <a type="button" class="btn btn-danger btn-sm waves-effect waves-light sa-warning" data-id="{{ $user->id }}">
                                                    <i class="mdi mdi-trash-can d-block font-size-16"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End card -->
                </div> <!-- End col -->
            </div> <!-- End row -->
        </div> <!-- End container-fluid -->
    </div> <!-- End page-content -->
@endsection

@push('js')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.sa-warning').forEach(button => {
                button.addEventListener('click', function () {
                    const userId = this.dataset.id;
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#2ab57d",
                        cancelButtonColor: "#fd625e",
                        confirmButtonText: "Yes, delete it!"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            const url = `{{ route('user.delete', ':id') }}`.replace(':id', userId);
                            try {
                                const response = await fetch(url, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    }
                                });

                                if (response.ok) {
                                    Swal.fire("Deleted!", "User has been deleted.", "success").then(() => {
                                        location.reload(); // Reload the page after the success message is shown
                                    });
                                } else {
                                    Swal.fire("Error!", "Unable to delete user.", "error");
                                }
                            } catch (error) {
                                Swal.fire("Error!", "Unable to delete user.", "error");
                            }
                        }
                    });
                });
            });

            document.querySelectorAll('.active-btn').forEach(checkbox => {
                checkbox.addEventListener('change', async (event) => {
                    const userId = event.target.id.split('square-switch')[1];
                    const status = event.target.checked ? 1 : 0;

                    const url = `{{ route('user.toggle', ':id') }}`.replace(':id', userId);

                    try {
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({status})
                        });

                        const result = await response.json();
                        if (result.message === 'Success! status updated') {
                            toastr.success("Status Updated Successfully!!");
                        } else {
                            toastr.error("Sorry! Something went wrong!!");
                        }
                    } catch (error) {
                        toastr.error("Sorry! Something went wrong!!");
                    }
                });
            });
        });
    </script>
@endpush
