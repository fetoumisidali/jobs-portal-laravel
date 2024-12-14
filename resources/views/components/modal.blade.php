@props(['name', 'show' => false, 'maxWidth' => 'md'])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp




<div x-data="{ show: @js($show) }" x-show="show" style="display: {{ $show ? 'block' : 'none' }};"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null">
    <div x-show="show" class="fixed inset-0 flex items-center justify-center
    bg-gray-900 bg-opacity-50">

        <div class="bg-white p-6 rounded w-full max-w-md">
            {{ $slot }}
        </div>

    </div>



</div>


{{-- 
    use button like this to open the modal and change  open-modal to close-modal to close it

    <button x-data="" x-on:click="$dispatch('open-modal', 'my-model')">
            Modal
    </button> 

--}}
