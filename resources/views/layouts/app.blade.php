<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="flex flex-col w-screen h-screen text-gray-400">

	<!-- Component Start -->
        @include('layouts.inc.app.header')
            <div class="flex flex-col justify-center items-center flex-grow">

                <div class="container">
                    @yield('content')
                </div>

            </div>
            <!-- Component End  -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
