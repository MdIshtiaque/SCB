<style>
    .rounded-circle {
        border-radius: 0 !important;
    }

    .header-profile-user {

        background-color: transparent !important;

    }
    .seperator {
        margin: 0.6rem 0 !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box text-center pe-5">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/favicon.png') }}" alt="" height="24">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="30">
                                </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="24">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="24">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                        id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/avatar.png') }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <button class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"><i
                            class="mdi mdi mdi-form-textbox-password font-size-16 align-middle me-1"></i> Change
                        Password
                    </button>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item" href="auth-logout.html"><i
                                class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- right offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Change Password</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="seperator">
    <div class="offcanvas-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card-header">
                        <h4 class="card-title">Here you can Change Password</h4>
                        <p class="card-title-desc">This is only for Super Admin & Admin</p>
                    </div>
                    <!-- end card header -->
                    <hr>
                    <div class="card-body">

                        <form id="pristine-valid-example" action="{{ route('update.password') }}" style="width : 100%"
                              novalidate method="post">
                            @csrf
                            <div class="col-xl-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" id="pwd" name="password" autocomplete required
                                           data-pristine-pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/"
                                           data-pristine-pattern-message="Minimum 8 characters, at least one uppercase letter, one lowercase letter and one number"
                                           class="form-control" placeholder="Enter your password"/>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label>Retype password</label>
                                    <input type="password" data-pristine-equals="#pwd" name="password_confirmation"
                                           autocomplete
                                           data-pristine-equals-message="Passwords don't match" required
                                           class="form-control" placeholder="Re-Enter your password"/>
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>


                    </div>

                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>
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
