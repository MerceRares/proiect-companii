<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Companies</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg bg-black text-white">
<div class="px-10 space-x-6 font-bold">
    <nav class="flex justify-between items-center py-4 border-b">
        <div>
            <a href="/">Home</a>
        </div>
        <div>
            @if (Route::currentRouteName() !== 'companies.create')
                <a href="{{ route('companies.create') }}">Add a new Company</a>
            @endif
        </div>
    </nav>
    <main class="mt-10 max-w-[986px] mx-auto">
        {{ $slot }}
    </main>
</div>
</body>
</html>
