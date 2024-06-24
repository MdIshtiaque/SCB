@extends('main')

@section('content')
    <div
        class="absolute h-full top-1/2 lg:top-0 left-1/2 transform -translate-x-1/2 w-full p-8 bg-transparent flex items-center justify-center flex-col gap-10">

        <div
            class="flex items-center justify-center flex-col gap-5 max-w-3xl border-gray-400 shadow-sm bg-gradient-to-b from-custom-blue to-custom-green text-center mx-auto p-5 lg:px-24 lg:py-20 text-white backdrop-blur-[2px] rounded-md">
            {{-- <dotlottie-player src="https://lottie.host/8f8cf162-952b-4586-a064-f009b94bd423/uBjOxx4On4.json"
                background="transparent" speed="1" style="width: 200px; height: 200px;" autoplay></dotlottie-player> --}}
            <div class="mb-10 lg:mb-20">
                <h1 class="text-4xl font-bold text-center mx-auto leading-8 py-3 drop-shadow-2xl">
                    Thank you!
                </h1>
                <p>For choosing Standard Chartered Priority!
                    <span class="block">A relationship manager of Standard Chartered will contact you
                        shortly</span>
                </p>
            </div>
            <a href="{{ route('home') }}"
                class="bg-transparent hover:bg-gradient-to-r from-[#0574EA] to-[#38D200] transition-colors duration-300 outline outline-1 hover:outline-none rounded-full px-6 py-2 text-white flex items-center gap-3"
                href="">
                <svg class="h-5 w-5 fill-white" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                </svg><span>Go
                    to Home</span></a>
        </div>

    </div>
@endsection
