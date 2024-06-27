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
    <div>
        <div class="relative w-full h-[calc(60vh)] bg-cover bg-top mx-auto max-w-[2536px] overflow-hidden">
            <div class="absolute top-8 left-8">
                <img class="h-4 lg:h-6" src="{{ asset('images/logo.png') }}" alt="company-logo">
            </div>
            <div class="relative w-full h-full after:content-[''] after:absolute after:inset-0 after:bg-gradient-to-t after:from-black after:to-transparent">
                <picture>
                    <source srcset="{{ asset('images/background-image.png') }}" media="(min-width: 768px)">
                    <source srcset="{{ asset('images/mobile-background-image.png') }}" media="(max-width: 768px)">
                    <img class="w-full h-full object-top object-cover" src="{{ asset('images/background-image.png') }}" loading="lazy" alt="Background Image">
                </picture>
            </div>

        </div>
        <div class="text-white">hello</div>
    </div>

</body>
@include('scripts')

</html>