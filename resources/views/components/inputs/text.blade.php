@props(['id', 'name', 'label' => null,
 'type' => 'text', 'value' => '', 'placeholder' => '',
 'required' => false , 'disabled' => false])

<div class="mb-4">
    @if($label)
        <label  class="block text-gray-700" for="{{$id}}">{{$label}}</label>
    @endif
    <input @if($disabled) disabled @endif  @if($required) required @endif id="{{$id}}" type="{{$type}}" name="{{$name}}"
           class="w-full px-4 py-2 border rounded focus:outline-none
           disabled:bg-gray-100
           disabled:font-semibold
           {{ $type  == 'number' ? 'no-spin' : ''}}  
            @error($name) border-red-500 @enderror"
           placeholder="{{$placeholder}}" value="{{old($name, $value)}}" />
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
    @enderror
</div>
