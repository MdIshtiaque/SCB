<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
    Swal.fire({
      title: 'Thank You!',
      text: "{{ session('success') }}",
      icon: 'success',
      confirmButtonText: 'OK'
    });
    @endif

    @if(session('error'))
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


  <div class="relative w-full min-h-screen bg-cover bg-center mx-auto custom-background max-w-['2536px']">
    <div
      class="absolute h-full top-0 left-1/2 transform -translate-x-1/2 w-full max-w-5xl p-8 bg-transparent text-white">
      <h1 class="text-2xl mt-10 lg:text-5xl font-bold mb-4 text-center mx-auto">Exclusive Priority Banking Privileges
        that Include your
        family too</h1>
      <form class="mt-64" action="{{ route('save') }}" method="POST">
        @csrf
        <div class="w-full lg:max-w-3/4">
          <h3 class="text-[1.857rem]">Thank you for choosing Standard Chartered Priority!</h3>
          <p>Please share your name, phone number and city below. A relationship manager of Standard Chartered
            will
            contact you shortly.</p>
        </div>
        <div class="mt-8 flex items-center gap-3 mb-10">
          <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path
              d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
          </svg>
          <input type="text" name="full_name" placeholder="Full Name" required
            class="block w-full px-4 py-2 border border-white rounded-full bg-transparent">
        </div>

        <div class="flex flex-col gap-10 lg:flex-row lg:gap-44 items-center lg:justify-between">
          <div class="flex w-full flex-grow-1 items-center gap-3">
            <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
              <path
                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
            </svg>
            <input type="tel" name="mobile" placeholder="Mobile Number" required
              class="block w-full px-4 py-2 border border-white rounded-full bg-transparent">
          </div>


          <div class="flex w-full items-center gap-3">
            <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
              <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
              <path
                d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z" />
            </svg>

            <select name="city" required
              class="block w-full max-w-4xl px-4 py-2 border border-white rounded-full bg-transparent">
              <option class="text-black" value="">Select City</option>
              <option class="text-black" value="dhaka">Dhaka</option>
              <option class="text-black" value="chattogram">Chattogram</option>
              <option class="text-black" value="khulna">Khulna</option>
              <option class="text-black" value="rajshahi">Rajshahi</option>
              <option class="text-black" value="sylhet">Sylhet</option>
              <option class="text-black" value="barisal">Barisal</option>
              <option class="text-black" value="mymensingh">Mymensingh</option>
              <option class="text-black" value="rangpur">Rangpur</option>
              <option class="text-black" value="cumilla">Cumilla</option>
              <option class="text-black" value="gazipur">Gazipur</option>
              <option class="text-black" value="narayanganj">Narayanganj</option>
              <option class="text-black" value="brahmanbaria">Brahmanbaria</option>
              <option class="text-black" value="chandpur">Chandpur</option>
              <option class="text-black" value="coxs_bazar">Cox's Bazar</option>
              <option class="text-black" value="feni">Feni</option>
              <option class="text-black" value="lakshmipur">Lakshmipur</option>
              <option class="text-black" value="chowmuhani">Chowmuhani</option>
              <option class="text-black" value="maijdee">Maijdee</option>
              <option class="text-black" value="rangamati">Rangamati</option>
              <option class="text-black" value="savar">Savar</option>
              <option class="text-black" value="faridpur">Faridpur</option>
              <option class="text-black" value="kaliakair">Kaliakair</option>
              <option class="text-black" value="sreepur">Sreepur</option>
              <option class="text-black" value="gopalganj">Gopalganj</option>
              <option class="text-black" value="bhairab">Bhairab</option>
              <option class="text-black" value="tongi">Tongi</option>
              <option class="text-black" value="bogura">Bogura</option>
              <option class="text-black" value="jessore">Jessore</option>
              <option class="text-black" value="dinajpur">Dinajpur</option>
              <option class="text-black" value="nawabganj">Nawabganj</option>
              <option class="text-black" value="tangail">Tangail</option>
              <option class="text-black" value="sirajganj">Sirajganj</option>
              <option class="text-black" value="naogaon">Naogaon</option>
              <option class="text-black" value="pabna">Pabna</option>
              <option class="text-black" value="habiganj">Habiganj</option>
              <option class="text-black" value="mongla">Mongla</option>
              <option class="text-black" value="feni_sadar">Feni Sadar</option>
            </select>
          </div>

        </div>

        <!-- button -->
        <div class="text-center mt-10">
          <button type="submit"
            class="px-10 py-2 bg-transparent border border-white text-white rounded-full hover:bg-gray-600 mb-10">
            SUBMIT
          </button>
        </div>
      </form>

      <div>
        <div class="flex items-center flex-start gap-3">
          <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path
              d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
          </svg>
          <h3 class="text-xl">What is in the store for you:</h3>
        </div>
        <ul class="list-disc list-inside mt-5">
          <li>Dedicated Relationship Manager</li>
          <li>Dedicated Priority Center</li>
          <li>Access for Airport Lounge</li>
          <li>Unparalleled waivers and special offers</li>
          <li>Higher withdrawals & unique shopping experience with priority debit card</li>
          <li>Priority privilege for immediate family</li>
        </ul>
      </div>
    </div>

  </div>

</body>

</html>