<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    {!! SEO::generate() !!}

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/animatecss/3.4.0/animate.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/assets/toastr.min.css') }}">
    <script src="{{ asset('js/assets/toastr.min.js') }}"></script>
    @livewireStyles
    @stack("styles")
    <!-- <script>
        $("#js-rotating").Morphext({/* The [in] animation type. Refer to Animate.css for a list of available animations.*/
            animation: "bounceIn",/* An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).*/
            separator: ",",/* The delay between the changing of each phrase in milliseconds.*/
            speed: 2000,
            complete: function () {/* Called after the entrance animation is executed.*/
            }
        })
    </script> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body class="font-sans antialiased overflow-x-hidden">
<div class="min-h-screen bg-gray-100">
    @livewire('navigation-dropdown')

    <!-- Page Content -->
    <main>
        {{ $slot ?? null }}
    </main>
</div>

@stack('modals')

@livewireScripts
@stack("scripts")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    window.addEventListener('alert', event => {
        Swal.fire({
            position: 'top-end',
            icon: event.detail.type,
            title: event.detail.message,
            showConfirmButton: false,
            timer: 1500
        });
    })
</script>
<script>
    window.addEventListener('alert', event => {
        Swal.fire({
            position: 'center',
            icon: event.detail.type,
            title: event.detail.title,
            message: event.detail.message,
            showConfirmButton: true,
        });
    })
</script>

<script>
    @if(session()->has('message'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(session()->has('error'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(session()->has('info'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(session()->has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.warning("{{ session('warning') }}");
    @endif

   

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
