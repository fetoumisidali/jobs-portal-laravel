<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources\css\app.css')
</head>

<body class="min-h-screen flex flex-col">
    <header class="bg-blue-900 text-white">
        <div class="py-5 px-3 container mx-auto justify-between flex items-center ">
            <h1 class="cursor-pointer select-none text-3xl font-semibold">Jobs Portal</h1>
        </div>
    </header>
    {{ $slot }}
</body>

</html>
