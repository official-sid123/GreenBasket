<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenBascet</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">
    @include('partials.header')

    <div class="flex">
        @include('partials.sidebar')

        <main class="flex-1 p-6 ml-0 md:ml transition-all duration-300">
            @yield('content')
        </main>
    </div>

    @include('partials.footer')
</body>

</html>
