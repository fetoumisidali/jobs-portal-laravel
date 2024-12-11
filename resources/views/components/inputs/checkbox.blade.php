@props(['name', 'label' => null, 'required' => false, 'choices' => []])

@foreach ($choices as $value => $choice)
    <div class="flex items-center mb-2 ms-2">
        <input @if ($required) required @endif id="{{ $name . '-' . $value }}" type="radio"
            name="{{ $name }}" value="{{ $choice === true ? '1' : ($choice === false ? '0' : $choice) }}"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg 
                   dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600
                   @error($name) border-red-500 ring-red-500 @enderror"
            {{ old($name) == ($choice === true ? '1' : ($choice === false ? '0' : $choice)) ? 'checked' : '' }}>
        <label for="{{ $name . '-' . $value }}"
            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 
                   @error($name) text-red-500 @enderror">
            {{ $value }}
        </label>
    </div>
@endforeach
