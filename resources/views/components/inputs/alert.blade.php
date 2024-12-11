@props(['type','message'])


<div
    x-show='show'
    x-data="{show : true}"
    x-init="setTimeout(() => show = false ,3000)"
 @class([
    'bg-red-500' => $type == 'error', 
    'bg-green-500' => $type == 'success', 
    'p-4 mx-6 my-4 text-white rounded-xl '
])>
    <p>{{$message}}</p>
</div>
