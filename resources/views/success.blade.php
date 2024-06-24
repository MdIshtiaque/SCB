<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Thank You!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    backgroundImage: {
                        'gradient-bottom-dark': "linear-gradient(to bottom, rgba(255, 255, 255, 0) 75%, rgba(0, 0, 0, 0.8) 100%), url('/images/background-image.png')"
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>


    <title>SCB</title>
</head>
<style>
    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: inherit;
    }

    /* html {
          font-size: 87.5%;
        } */

    body {
        background-color: #fffafa;
        box-sizing: border-box;
    }

    .custom-background {
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 1) 80%),
            url('images/background-image.png');
        width: 100%;

    }
</style>

<body class="bg-black">


    <div class="relative w-full min-h-screen bg-cover bg-center mx-auto custom-background max-w-[2536px]">
        <div class="absolute top-8 left-8">
            <img class="h-10" src="{{ asset('images/logo.png') }}" alt="company-logo">
        </div>
        <div
            class="absolute h-full top-0 left-1/2 transform -translate-x-1/2 w-full p-8 bg-transparent flex items-center justify-center flex-col gap-10">

            <div
                class="flex items-center justify-center flex-col gap-5 max-w-3xl border bg-white bg-opacity-10 text-center mx-auto p-5 text-white">
                <dotlottie-player src="https://lottie.host/8f8cf162-952b-4586-a064-f009b94bd423/uBjOxx4On4.json"
                    background="transparent" speed="1" style="width: 200px; height: 200px;"
                    autoplay></dotlottie-player>
                <div>
                    <h1 class="text-4xl font-bold text-center mx-auto leading-8 py-3 drop-shadow-2xl">
                        Thank you!
                    </h1>
                    <p>For choosing Standard Chartered Priority!
                        <span class="block">A relationship manager of Standard Chartered will contact you
                            shortly</span>
                    </p>
                </div>
            </div>
            <a class="bg-transparent border rounded-full px-6 py-2 text-white flex items-center gap-3 hover:bg-gray-500"
                href="">
                <svg class="h-5 w-5 fill-white" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                </svg><span>Go
                    to Home</span></a>
        </div>

    </div>

</body>

</html>
