@extends('main')
@section('content')
    <div
        class="absolute h-full top-0 left-1/2 transform -translate-x-1/2 w-full max-w-7xl p-8 pt-0 bg-transparent text-white">
        <h1 class="title title-bg text-2xl min-w-64 lg:text-5xl mb-4 text-center mx-auto leading-8 py-3 drop-shadow-2xl">
            <span><svg class="inline-block mr-1 lg:mr-2 h-2 lg:h-5" viewBox="0 0 24 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.47721 16.9384C10.5183 16.9384 11.9709 16.2916 13.388 15.3747L23.9999 8.47019L13.388 1.56572C11.9579 0.644437 10.4559 0.000229891 8.47721 0.000229891C3.82689 0.000229891 -5.96046e-05 3.82349 -5.96046e-05 8.46932C-5.96046e-05 13.1152 3.82689 16.9384 8.47721 16.9384Z"
                        fill="#FFFFFF" />
                </svg></span>Exclusive
            Priority
            Banking
            <span class="block">Privileges that Include your
                family too<svg class="inline-block ml-1 lg:ml-2 h-2 lg:h-5" viewBox="0 0 24 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.5227 0C13.4816 0 12.029 0.646806 10.612 1.56376L0 8.46823L10.612 15.3727C12.042 16.294 13.544 16.9382 15.5227 16.9382C20.1731 16.9382 24 13.1149 24 8.46909C24 3.82326 20.1731 0 15.5227 0Z"
                        fill="#FFFFFF" />
                </svg></span>
        </h1>
        <form class="mt-40 lg:mt-64" action="{{ route('save') }}" method="POST">
            @csrf
            <div class="w-full lg:max-w-3xl">
                <h3 class="text-lg lg:text-2xl w-full lg:max-w-3xl">Thank you for choosing Standard Chartered
                    Priority!
                </h3>
                <p class="w-full lg:max-w-3xl mt-4">Please share your name, phone number and city below. A
                    relationship
                    Standard Chartered
                    will
                    contact you shortly.</p>
            </div>
            <div class="mt-8 flex items-center gap-3 mb-6 lg:mb-10 relative">
                <svg class="w-6 h-6 fill-white" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.4047 0.758934C15.9092 0.758934 18.7497 3.47599 18.7497 6.82806C18.7497 10.1801 15.9092 12.8972 12.4047 12.8972C8.90032 12.8972 6.05975 10.1801 6.05975 6.82806C6.05975 3.47599 8.90032 0.758934 12.4047 0.758934Z"
                        fill="white" />
                    <path
                        d="M12.4048 15.9317C6.05312 15.9317 0.904785 20.8568 0.904785 26.9317H23.9048C23.9048 20.8568 18.7565 15.9317 12.4048 15.9317Z"
                        fill="white" />
                </svg>
                <input type="text" name="full_name" placeholder="Full Name"
                    class="block w-full px-4 py-2 border border-white rounded-full bg-transparent">
            </div>

            <div class="flex flex-col gap-6 lg:flex-row lg:gap-44 items-center lg:justify-between">
                <div class="flex w-full flex-grow-1 items-center gap-3 relative">
                    <svg class="w-6 h-6 fill-white" viewBox="0 0 22 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.9999 28.9518C12.1854 28.9518 13.1459 29.9045 13.1459 31.08C13.1459 32.2562 12.1854 33.2089 10.9999 33.2089C9.8144 33.2089 8.85393 32.2554 8.85393 31.08C8.85393 29.9045 9.8144 28.9518 10.9999 28.9518ZM0.00012207 31.7257C0.00012207 33.4595 1.41067 34.8708 3.14524 34.8708H18.8546C20.5891 34.8708 21.9997 33.4595 21.9997 31.7257V27.3263H0.00012207V31.7257Z"
                            fill="white" />
                        <path d="M0.000427246 7.66221H22V25.052H0.000427246V7.66221Z" fill="white" />
                        <path
                            d="M21.9996 3.14512C21.9996 1.41132 20.589 4.76837e-07 18.8552 4.76837e-07H3.14512C1.41132 4.76837e-07 0 1.41132 0 3.14512V5.38853H21.9996V3.14512Z"
                            fill="white" />
                    </svg>
                    <input type="number" name="mobile" placeholder="Mobile Number"
                        class="block w-full px-4 py-2 border border-white rounded-full bg-transparent" pattern="\d*">
                </div>


                <div class="flex w-full items-center gap-3 relative">
                    <svg class="w-6 h-6 fill-white" width="22" height="31" viewBox="0 0 22 31" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 0C4.92731 0 0 4.43506 0 9.9C0 18.7 11 30.8 11 30.8C11 30.8 22 18.7 22 9.9C22 4.43506 17.0727 0 11 0ZM11 15.4C10.1298 15.4 9.27907 15.1419 8.55549 14.6585C7.83192 14.175 7.26796 13.4878 6.93493 12.6838C6.6019 11.8798 6.51477 10.9951 6.68454 10.1416C6.85432 9.28809 7.27338 8.50408 7.88873 7.88873C8.50408 7.27338 9.28809 6.85432 10.1416 6.68454C10.9951 6.51477 11.8798 6.6019 12.6838 6.93493C13.4878 7.26796 14.175 7.83192 14.6585 8.55549C15.1419 9.27907 15.4 10.1298 15.4 11C15.3987 12.1666 14.9347 13.285 14.1099 14.1099C13.285 14.9347 12.1666 15.3987 11 15.4Z"
                            fill="white" />
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
                <svg class="w-6 h-6" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14 27C21.1797 27 27 21.1797 27 14C27 6.8203 21.1797 1 14 1C6.8203 1 1 6.8203 1 14C1 21.1797 6.8203 27 14 27Z"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M14 19.2V14M14 8.79999H14.013" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
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
        @include('footer')
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
                    showError(mobile, 'Please enter a valid 11-digit mobile number');
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
                    showError(mobile, 'Please enter a valid 11-digit mobile number');
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
