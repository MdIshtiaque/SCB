@extends('layouts.main-layout')

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <!-- Sweet Alert -->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        .dataTables_wrapper .bottom {
            display: flex;
            justify-content: start;
            align-items: center;
            /*margin-top: 15px;*/
            padding-top: 15px;
            gap: 20px;
        }

        .position-relative {
            position: relative;
        }

        #loadingIndicator {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 50;
            justify-content: center;
            align-items: center;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        .delete-selected-btn {
            display: none;
            margin-bottom: 10px;
            /*margin-left: auto;*/
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Priority List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0 mb-3">
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
                            <div class="row g-3 d-flex justify-content-end">
                                <div class="col-md-3">
                                    <input type="date" id="minDate" name="minDate" class="form-control" data-column="4">
                                    <small class="form-text text-muted">From Date</small>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" id="maxDate" name="maxDate" class="form-control" data-column="4">
                                    <small class="form-text text-muted">To Date</small>
                                </div>
                                <div class="col-md-1">
                                    <a href="#"
                                       type="button" id="resetButton"
                                       class="btn btn-dark btn-sm waves-effect waves-light d-flex align-items-center justify-content-center">
                                        <i class="mdi mdi-restart font-size-16 me-2"></i><span>Reset</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body position-relative">
                            <div id="loadingIndicator"
                                 style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 50; display: flex; justify-content: center; align-items: center;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-3">
                                <button id="deleteSelected" class="btn btn-danger delete-selected-btn" style="display: none">
                                    Delete Selected
                                </button>
                            </div>
{{--                            <button id="deleteSelected" class="btn btn-danger delete-selected-btn">--}}
{{--                                Delete Selected--}}
{{--                            </button>--}}
                            <div class="table-responsive">
                                <table id="datatable-buttons"
                                       class="table table-bordered dt-responsive nowrap w-100 text-center">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center; width: 50px"><input type="checkbox" id="select-all"></th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>City</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td><input type="checkbox" class="row-checkbox" data-id="{{ $item->id }}"></td>
                                            <td>{{ $item->full_name }}</td>
                                            <td>{{ $item->mobile }}</td>
                                            <td>{{ $item->city }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Dhaka')->format('h:i A') }}</td>
                                            <td><a type="button"
                                                   class="btn btn-danger btn-sm waves-effect waves-light sa-warning"
                                                   data-id="{{ $item->id }}">
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
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/dateFilter.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable-buttons thead th:first-child').off('.DT').removeClass('sorting sorting_asc sorting_desc');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#resetButton').click(function (e) {
                e.preventDefault();
                $('#minDate').val('');
                $('#maxDate').val('');
                // Clear all search filters
                window.table.search('').columns().search('').draw();
            });
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#resetButton').click(function (e) {
                e.preventDefault();
                $('#minDate').val('');
                $('#maxDate').val('');
                // Clear all search filters
                window.table.search('').columns().search('').draw();
            });

            // Select/Deselect all checkboxes
            $('#select-all').on('click', function(){
                let isChecked = $(this).is(':checked');
                $('.row-checkbox').prop('checked', isChecked);
                toggleDeleteButton();
            });

            // Handle row checkbox change
            $('.row-checkbox').on('change', function(){
                toggleDeleteButton();
                if($('.row-checkbox:checked').length === $('.row-checkbox').length){
                    $('#select-all').prop('checked', true);
                } else {
                    $('#select-all').prop('checked', false);
                }
            });

            function toggleDeleteButton() {
                if($('.row-checkbox:checked').length > 0){
                    $('#deleteSelected').show();
                } else {
                    $('#deleteSelected').hide();
                }
            }

            // Handle delete selected button click
            $('#deleteSelected').on('click', function(){
                let selectedIds = $('.row-checkbox:checked').map(function(){
                    return $(this).data('id');
                }).get();

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#2ab57d",
                    cancelButtonColor: "#fd625e",
                    confirmButtonText: "Yes, delete them!"
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const response = await fetch('{{ route("records.bulkDelete") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({ ids: selectedIds })
                            });

                            if (response.ok) {
                                Swal.fire("Deleted!", "Records have been deleted.", "success").then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire("Error!", "Unable to delete Records.", "error");
                            }
                        } catch (error) {
                            Swal.fire("Error!", "Unable to delete Records.", "error");
                        }
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.querySelectorAll('.sa-warning').forEach(button => {
            button.addEventListener('click', function () {
                const record = this.dataset.id;
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
                        const url = `{{ route('record.delete', ':id') }}`.replace(':id', record);
                        try {
                            const response = await fetch(url, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                }
                            });

                            if (response.ok) {
                                Swal.fire("Deleted!", "Record has been deleted.", "success").then(() => {
                                    location.reload(); // Reload the page after the success message is shown
                                });
                            } else {
                                Swal.fire("Error!", "Unable to delete Record.", "error");
                            }
                        } catch (error) {
                            Swal.fire("Error!", "Unable to delete Record.", "error");
                        }
                    }
                });
            });
        });
    </script>
@endpush
