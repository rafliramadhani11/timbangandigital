<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="icon" href="{{ asset('img/chart.png') }}">
    <title>Timbangan Digital</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-800">

    @include('partials.user-navbar', ['user' => Auth::user()])
    <div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @include('partials.sidebar', ['user' => Auth::user()])
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main class="px-4 py-6 ">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>