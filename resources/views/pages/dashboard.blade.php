@extends('layouts.main-layout')

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
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
    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Record List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0 mb-3">
{{--                                <li class="breadcrumb-item"><a href="javascript: void(0);">Record Data</a></li>--}}
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
                            <div id="loadingIndicator" style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 50; display: flex; justify-content: center; align-items: center;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable-buttons"
                                       class="table table-bordered dt-responsive nowrap w-100 text-center">
                                    <thead>
                                    <tr>
                                        <th>Sl no.</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>City</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->full_name }}</td>
                                            <td>{{ $item->mobile }}</td>
                                            <td>{{ $item->city }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Dhaka')->format('h:i A') }}</td>
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
@endpush
