@props(['routeName','mobile' => null])



@if ($mobile)
   <a href="{{route($routeName)}}" @class(
        ['block px-4 py-2 hover:bg-blue-800',
         'text-yellow-500 font-bold' => request()->routeIs($routeName)
            ])>{{$slot}}
    </a> 
@else
    <a href="{{route($routeName)}}" @class(
    ['text-white py-2 hover:border-b-2 hover:border-b-white border-b-2 border-b-transparent', 
    'border-b-2 border-yellow-500 text-yellow-500 font-bold' => request()->routeIs($routeName)]
    ) >{{$slot}}</a>

@endif



