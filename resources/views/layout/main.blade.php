<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="icon" href="{{ asset('img/chart.png') }}">
    <title>Timbangan Digital</title>
</head>

<body class="bg-gray-50 dark:bg-gray-800">
    @yield('content')
</body>

</html>
