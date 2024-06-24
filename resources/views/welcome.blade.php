@extends('main')
@push('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }

        input[type=number] {
            -moz-appearance:textfield; /* Firefox */
        }
    </style>
@endpush
@section('content')
    <div class="absolute h-full top-0 left-1/2 transform -translate-x-1/2 w-full max-w-7xl p-8 bg-transparent text-white">
        <h1 class="text-3xl mt-24 lg:mt-36 lg:text-5xl font-bold mb-4 text-center mx-auto leading-8 py-3 drop-shadow-2xl">
            Exclusive
            Priority
            Banking

            <span class="block">Privileges that Include your
                family too</span>
        </h1>
        <form class="mt-12 lg:mt-64" action="{{ route('save') }}" method="POST">
            @csrf
            <div class="w-full lg:max-w-3xl">
                <h3 class="text-xl lg:text-2xl w-full lg:max-w-3xl">Thank you for choosing Standard Chartered
                    Priority!
                </h3>
                <p class="w-full lg:max-w-3xl mt-5">Please share your name, phone number and city below. A
                    relationship
                    Standard Chartered
                    will
                    contact you shortly.</p>
            </div>
            <div class="mt-8 flex items-center gap-3 mb-6 lg:mb-10 relative">
                <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>
                <input type="text" name="full_name" placeholder="Full Name" class="block w-full px-4 py-2 border border-white rounded-full bg-transparent">
            </div>

            <div class="flex flex-col gap-6 lg:flex-row lg:gap-44 items-center lg:justify-between">
                <div class="flex w-full flex-grow-1 items-center gap-3 relative">
                    <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                    </svg>
                    <input type="number" name="mobile" placeholder="Mobile Number"
                        class="block w-full px-4 py-2 border border-white rounded-full bg-transparent">
                </div>


                <div class="flex w-full items-center gap-3 relative">
                    <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z" />
                    </svg>

                    <select name="city"
                        class="block w-full max-w-4xl px-4 py-2 border border-white rounded-full bg-transparent">
                        <option class="text-black" value="">Select City</option>
                        <option class="text-black" value="Dhaka">Dhaka</option>
                        <option class="text-black" value="Chattogram">Chattogram</option>
                        <option class="text-black" value="Sylhet">Sylhet</option>
                        <option class="text-black" value="Khulna">Khulna</option>
                        <option class="text-black" value="Bogura">Bogura</option>
                    </select>
                </div>

            </div>

            <!-- button -->
            <div class="text-center mt-10">
                <button type="submit"
                    class="px-10 py-2 bg-transparent hover:bg-gradient-to-r from-[#0574EA] to-[#38D200] transition-colors duration-300 outline outline-1 text-white rounded-full mb-10 hover:outline-none">
                    SUBMIT
                </button>
            </div>
        </form>

        <div class="pb-10">
            <div class="flex items-center flex-start gap-3">
                <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                </svg>
                <h3 class="text-xl">What is in the store for you:</h3>
            </div>
            <ul class="list-disc mt-5 pl-4">
                <li>Dedicated Relationship Manager</li>
                <li>Dedicated Priority Center</li>
                <li>Access for Airport Lounge</li>
                <li>Unparalleled waivers and special offers</li>
                <li>Higher withdrawals & unique shopping experience with priority debit card</li>
                <li>Priority privilege for immediate family</li>
            </ul>
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM fully loaded and parsed');

            const form = document.querySelector('form');
            const fullName = document.querySelector('input[name="full_name"]');
            const mobile = document.querySelector('input[name="mobile"]');
            const city = document.querySelector('select[name="city"]');

            console.log('Form:', form);
            console.log('Full Name input:', fullName);
            console.log('Mobile input:', mobile);
            console.log('City select:', city);

            if (!form) {
                console.error('Form not found!');
                return;
            }

            form.addEventListener('submit', (e) => {
                console.log('Form submit event triggered');

                let valid = true;

                // Clear previous errors
                document.querySelectorAll('.error').forEach(error => error.remove());

                // Validate Full Name
                if (fullName.value.trim() === '') {
                    console.log('Full Name validation failed');
                    valid = false;
                    showError(fullName, 'Full Name is required');
                }

                // Validate Mobile Number
                const mobilePattern = /^01[3-9]\d{8}$/; // Bangladeshi mobile number pattern
                if (!mobilePattern.test(mobile.value.trim())) {
                    console.log('Mobile Number validation failed');
                    valid = false;
                    showError(mobile, 'Please enter a valid 11-digit mobile number (e.g., 017XXXXXXXX)');
                }

                // Validate City
                if (city.value === '') {
                    console.log('City validation failed');
                    valid = false;
                    showError(city, 'Please select a city');
                }

                if (!valid) {
                    e.preventDefault();
                    console.log('Form submission prevented due to validation errors');
                }
            });

            // Real-time validation
            fullName.addEventListener('input', () => {
                clearError(fullName);
                if (fullName.value.trim() === '') {
                    showError(fullName, 'Full Name is required');
                }
            });

            mobile.addEventListener('input', () => {
                clearError(mobile);
                const mobilePattern = /^01[3-9]\d{8}$/; // Bangladeshi mobile number pattern
                if (!mobilePattern.test(mobile.value.trim())) {
                    showError(mobile, 'Please enter a valid 11-digit mobile number (e.g., 017XXXXXXXX)');
                }
            });

            city.addEventListener('change', () => {
                clearError(city);
                if (city.value === '') {
                    showError(city, 'Please select a city');
                }
            });

            function showError(input, message) {
                const error = document.createElement('p');
                error.className = 'error text-red-500 text-xs absolute -bottom-5 left-0 pl-10';
                error.textContent = message;
                input.parentElement.appendChild(error);
            }

            function clearError(input) {
                const error = input.parentElement.querySelector('.error');
                if (error) {
                    error.remove();
                }
            }
        });
    </script>


@endpush

