<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @laravelPWA
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        style="background-color: rgba(63, 38, 57, 1)">
        <div class="">
            <a href="/">
                <x-application-logo class="fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById('view1').classList.add("hidden");
                document.getElementById('view2').classList.remove("hidden");

                if (document.getElementById('password_confirmation') !== null) {
                    document.getElementById('password_confirmation').type = "text";
                }
            } else {
                x.type = "password";
                document.getElementById('view1').classList.remove("hidden");
                document.getElementById('view2').classList.add("hidden");

                if (document.getElementById('password_confirmation') !== null) {
                    document.getElementById('password_confirmation').type = "password";
                }
            }
        }
    </script>

</body>

</html>
