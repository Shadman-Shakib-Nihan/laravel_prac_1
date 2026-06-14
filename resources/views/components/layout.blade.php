@props([
    'title' => 'Default Title'
])

<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>


    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="text-primary">
    <x-nav />

    <main class="max-w-3xl mx-auto p-6">
        {{ $slot }}
    </main>
</body>
</html>

<!-- class="bg-gray-700 min-h-screen p-6 max-w-4xl mx-auto" -->
