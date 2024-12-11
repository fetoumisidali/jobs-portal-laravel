@props(['id','name','label' => null,
'value','required' => false])


<div class="flex items-center mb-2 ms-2">
    <input @if($required) required @endif id="{{$id}}" type="radio" name="{{$name}}" value="{{$value}}"
        class="
        @error($name) border-red-500 ring-red-5OO @enderror
        w-4 h-4  text-blue-600 bg-gray-100
         border-gray-300 rounded-lg
          dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600
          "
         {{old($name) == $value ? 'checked' : ''}} >
    <label for="{{$id}}" class="ms-2 text-sm @error($name) text-red-500 @enderror font-medium
     text-gray-900 dark:text-gray-300">
        {{$label}}
    </label>
</div>
