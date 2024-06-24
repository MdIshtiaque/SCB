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

@stack('js')
