<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Laravel APP' }} </title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-header />



    @if (request()->routeIs('home'))
        <x-hero />
    @endif

    <div class="container mx-auto">
            @if (session()->has('error'))
                <x-inputs.alert type="error" message="{{ session('error') }}" />
            @endif
            @if (session()->has('success'))
                <x-inputs.alert type="success" message="{{ session('success') }}" />
            @endif

        </div>

    <div class="container mx-auto m-4">
        
        {{ $slot }}
    </div>

</body>

</html>
