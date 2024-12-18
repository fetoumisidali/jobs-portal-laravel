@props(['routeName', 'color' => 'green',
    'textWhite' => false,"mobile" => false])

@php
    $bgColor = "bg-{$color}-500";
    $hoverColor = "hover:bg-{$color}-600";
@endphp

<a  href={{ route($routeName) }}
    class="{{ $bgColor }} {{ $hoverColor }} 
    {{$mobile ? 'inline-block' : ''}}
    {{$textWhite ? 'text-white' : 'text-black'}} 
    font-medium  px-4 py-2 rounded
            hover:opacity-95">
    {{ $slot }}
</a>
