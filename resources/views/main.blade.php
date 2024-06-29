<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('styles')
    <title>Standard Chartered</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">


</head>

<body class="bg-black">


    <div class="custom-background relative w-full h-[calc(60vh)] lg:min-h-screen mx-auto max-w-[2536px]">
        {{-- <div class="absolute top-8 left-8">
            <img class="h-10" src="{{ asset('images/logo.png') }}" alt="company-logo">
    </div> --}}
    <div class="custom-background"></div>

    @yield('content')
    </div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageUrl = "{{ asset('images/background-image3.png') }}"; // Ensure the path is correct
        const backgroundImageElement = document.querySelector('.custom-background');


        // Create a new image object
        const img = new Image();
        img.onload = function() {
            // Once the image is loaded, set it as the background and fade in
            backgroundImageElement.style.backgroundImage = `linear-gradient(
                to bottom,
                rgba(13, 27, 62, 1) 0%,
                rgba(13, 27, 62, 0.8) 10%,
                rgba(13, 27, 62, 0) 35%,
                rgba(0, 0, 0, 0.8) 70%,
                rgba(0, 0, 0, 1) 95%
            ), url('${imageUrl}')`;

            // Animate opacity to 1
            backgroundImageElement.style.opacity = 1;
        };
        img.src = imageUrl;
    });
</script>
@include('scripts')


</html>