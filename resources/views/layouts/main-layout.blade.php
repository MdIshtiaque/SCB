<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Dashboard | SCB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="SCB" name="description"/>
    <meta content="SCB" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">

    @include('include.styles')

</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- Header Start -->
    @include('partials.header')
    <!-- Header End -->

    <!-- Left Sidebar Start -->
    @include('partials.left-sidebar')
    <!-- Left Sidebar End -->

    <div class="main-content">
        <!-- ============================================================== -->
        <!-- Start Content here -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Content here -->
        <!-- ============================================================== -->

        @include('partials.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
@include('partials.right-sidebar')
<!-- /Right-bar -->

{{--<!-- Right bar overlay-->--}}
{{--<div class="rightbar-overlay"></div>--}}

@include('include.scripts')

</body>

</html>
