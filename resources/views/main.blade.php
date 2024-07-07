<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('styles')
    <title>Standard Chartered</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0N7B4RSYRT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-0N7B4RSYRT');
    </script>
</head>

<body class="bg-black">


    <div
        class="relative w-full h-[calc(60vh)] lg:min-h-screen bg-cover bg-top md:bg-top-30 mx-auto custom-background max-w-[2536px]">
        {{-- <div class="absolute top-8 left-8">
            <img class="h-10" src="{{ asset('images/logo.png') }}" alt="company-logo">
        </div> --}}

        @yield('content')
    </div>

</body>

@include('scripts')

</html>
