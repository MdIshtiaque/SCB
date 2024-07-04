@extends('layouts.main-layout')

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Sweet Alert -->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        .text-danger {
            color: red;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @php
                use Carbon\Carbon;
            @endphp
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">
                            Email Recipient List (Email Sending Time :
                            {{
                                Carbon::createFromFormat('H:i', $timer->timer)
                                      ->format('h:i A')
                            }})
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0 mb-3">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Email Recipients</a></li>
                                <li class="breadcrumb-item active">Email Recipient List</li>
                            </ol>
                            <ol class="breadcrumb m-0 d-flex justify-content-end">
                                <li class="breadcrumb-item gap-1">
                                    <a class="btn btn-primary waves-effect btn-label waves-light" style="color: white" data-bs-toggle="modal" data-bs-target="#timeModal">
                                        <i class="bx bx-timer label-icon"></i> Set Time
                                    </a>
                                    <a href="#" class="btn btn-primary waves-effect btn-label waves-light" style="color: white" data-bs-toggle="modal" data-bs-target="#addEmailModal">
                                        <i class="bx bx-plus label-icon"></i> Add new Email
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
                                        <th style="width: 40px">SL no</th>
                                        <th>Email</th>
                                        <th style="width: 200px">Active/Inactive</th>
                                        <th style="width: 200px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($emails as $email)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $email->email }}</td>
                                            <td>
                                                <div class="square-switch">
                                                    <input type="checkbox" id="square-switch{{ $email->id }}" class="active-btn" switch="bool" {{ $email->is_active ? 'checked' : '' }}/>
                                                    <label for="square-switch{{ $email->id }}" data-on-label="on" data-off-label="off"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-danger btn-sm waves-effect waves-light sa-warning" data-id="{{ $email->id }}">
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
    <!-- Modal -->
    <div class="modal fade" id="addEmailModal" tabindex="-1" aria-labelledby="addEmailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmailModalLabel">Add New Emails</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="emailTags" class="form-label">Email Addresses</label>
                        <input type="text" class="form-control" id="emailTags" placeholder="Type email and press enter">
                        <div id="emailList" class="d-flex flex-wrap mt-2"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveEmails()">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="timeModal" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="timeModalLabel">Pick a Time</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form method="POST" action="{{ route('saveTime') }}" class="needs-validation" id="timeForm" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="timeInput" class="form-label">Time</label>
                            <input type="time" name="time" class="form-control" id="timeInput" value="{{ $timer->timer }}" required>
                            <div class="invalid-feedback">
                                Please enter a valid time.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Time</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
        (function () {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script>
        function saveTime() {
            var time = document.getElementById('timeInput').value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "saveTime.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    console.log("Time saved: " + this.responseText);
                }
            }
            xhr.send("time=" + time);
        }

    </script>
    <script>
        document.getElementById('emailTags').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                let emailInput = this.value.trim();
                if (emailInput && isValidEmail(emailInput) && !isDuplicate(emailInput)) {
                    let newTag = createEmailTag(emailInput);
                    document.getElementById('emailList').appendChild(newTag);
                    this.value = ''; // Clear input after adding
                } else if (isDuplicate(emailInput)) {
                    toastr.warning('Duplicate email, please enter a different email.'); // Using Toastr for duplicate warning
                } else {
                    toastr.error('Please enter a valid email.'); // Using Toastr for invalid email error
                }
            }
        });

        function isValidEmail(email) {
            return /^\S+@\S+\.\S+$/.test(email);
        }

        function isDuplicate(email) {
            let emails = Array.from(document.getElementById('emailList').children).map(tag => tag.getAttribute('data-email'));
            return emails.includes(email);
        }

        function createEmailTag(email) {
            let tag = document.createElement('span');
            tag.setAttribute('data-email', email);
            tag.className = 'badge bg-secondary m-1 font-size-13';
            tag.innerHTML = `${email} <i class="bx bx-x" onclick="removeTag(this)" style="cursor:pointer;"></i>`;
            return tag;
        }

        function removeTag(icon) {
            icon.parentElement.remove();
        }

        function saveEmails() {
            let emailTags = Array.from(document.getElementById('emailList').children).map(tag => tag.getAttribute('data-email'));
            fetch('{{ route('email-recipients.save-email') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ emails: emailTags })
            }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        $('#addEmailModal').modal('hide');
                        toastr.success("Emails added successfully!");
                        location.reload(); // Optionally reload page
                    } else {
                        toastr.error("Failed to add emails.");
                    }
                }).catch(error => toastr.error("Error saving emails."));
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.sa-warning').forEach(button => {
                button.addEventListener('click', function () {
                    const emailId = this.dataset.id;
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
                            const url = `{{ route('email.delete', ':id') }}`.replace(':id', emailId);
                            try {
                                const response = await fetch(url, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    }
                                });

                                if (response.ok) {
                                    Swal.fire("Deleted!", "Email has been deleted.", "success").then(() => {
                                        location.reload(); // Reload the page after the success message is shown
                                    });
                                } else {
                                    Swal.fire("Error!", "Unable to delete email.", "error");
                                }
                            } catch (error) {
                                Swal.fire("Error!", "Unable to delete email.", "error");
                            }
                        }
                    });
                });
            });

            document.querySelectorAll('.active-btn').forEach(checkbox => {
                checkbox.addEventListener('change', async (event) => {
                    const emailId = event.target.id.split('square-switch')[1];
                    const status = event.target.checked ? 1 : 0;

                    const url = `{{ route('email.toggle', ':id') }}`.replace(':id', emailId);

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
