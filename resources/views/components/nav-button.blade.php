@props(['routeName', 'textWhite' => false, 'mobile' => false])

<a href="{{ route($routeName) }}"
   {{ $attributes->merge(['class' => 
        ($mobile ? 'inline-block ' : '') .
        ($textWhite ? 'text-white ' : 'text-black ') .
        'font-medium px-4 py-2 rounded hover:opacity-95'
   ]) }}>
    {{ $slot }}
</a>
