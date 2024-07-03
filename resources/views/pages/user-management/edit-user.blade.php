@extends('layouts.main-layout')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0 mb-3">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Management</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                            <ol class="breadcrumb m-0 d-flex justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('user-management.user-list') }}"
                                                               class="btn btn-primary waves-effect btn-label waves-light"
                                                               style="color: white"><i
                                            class="bx bx-arrow-from-right label-icon"></i> Go to List</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Here you can edit user</h4>
                            <p class="card-title-desc">This is only for super admin to use</p>
                        </div>
                        <!-- end card header -->

                        <div class="card-body">
                            <div>
                                <form id="pristine-valid-example" action="{{ route('user.update', $user->id) }}"
                                      novalidate method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden"/>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6">
                                            <div class="form-group mb-3">
                                                <label>Full name</label>
                                                <input type="text" required name="name" value="{{ $user->name }}"
                                                       data-pristine-required-message="Please Enter your Full name"
                                                       class="form-control" placeholder="Full name"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="form-group mb-3">
                                                <label>Email</label>
                                                <input type="email" required name="email" value="{{ $user->email }}" autocomplete="username"
                                                       data-pristine-required-message="Please Enter a Email"
                                                       class="form-control" placeholder="Enter your Email"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Role</label>
                                                <select required class="form-control form-select" name="role_id">>
                                                    <option value="">Select Role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" {{ $user->role->name === $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="form-group mb-3">
                                                <label>Password</label>
                                                <input type="password" id="pwd" name="password" autocomplete="new-password"
                                                       data-pristine-pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/"
                                                       data-pristine-pattern-message="Minimum 8 characters, at least one uppercase letter, one lowercase letter and one number"
                                                       class="form-control" placeholder="Enter your password"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="form-group mb-3">
                                                <label>Retype password</label>
                                                <input type="password" data-pristine-equals="#pwd" name="password_confirmation" autocomplete="new-password"
                                                       data-pristine-equals-message="Passwords don't match"
                                                       class="form-control" placeholder="Re-Enter your password"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- pristine js -->
    <script src="{{ asset('assets/libs/pristinejs/pristine.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>;
    <!-- form validation -->
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

    <script>
        window.onload = function () {
            const form = document.getElementById("pristine-valid-example");
            const pristine = new Pristine(form);

            form.addEventListener("submit", function (e) {
                if (!pristine.validate()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            });
        };
    </script>

    {!! Toastr::message() !!}

@endpush
