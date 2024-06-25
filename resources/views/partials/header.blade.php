<style>
    .rounded-circle {
        border-radius: 0 !important;
    }

    .header-profile-user {

        background-color: transparent !important;

    }
</style>
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
