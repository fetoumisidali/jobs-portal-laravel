@props(['mobile' => false])

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="font-medium  px-4 py-2 rounded
            hover:opacity-95 bg-red-500
            {{$mobile ? 'inline-block' : ''}}
            ">
        Log out
    </button>
</form>
