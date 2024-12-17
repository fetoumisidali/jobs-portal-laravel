<header x-data="{ 'open': false }" class="bg-blue-900 text-white p-4">
    <div class="container mx-auto justify-between flex items-center ">

        <a @if(!request()->routeIs('home')) href='{{route('home')}}' @endif
             class="cursor-pointer select-none text-3xl font-semibold">Jobs Portal</a>

        <nav class="hidden md:flex space-x-4 items-center">
            <x-nav-link routeName="home">Home</x-nav-link>
            <x-nav-link routeName="jobs.index">Jobs</x-nav-link>

            @auth

                <x-nav-link routeName="dashboard">Dashboard</x-nav-link>
                <x-nav-link routeName="saved.index">Saved</x-nav-link>

            @endauth

            @guest

                <x-nav-link routeName="login">Log In</x-nav-link>
                <x-nav-link routeName="register">Register</x-nav-link>
            @endguest

            @auth
                <a href={{ route('jobs.create') }}
                    class="bg-yellow-500 hover:bg-yellow-600 text-black 
            font-medium  px-4 py-2 rounded
            hover:opacity-95">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Create Job
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="bg-red-500 hover:bg-red-600 text-white 
            font-medium  px-4 py-2 rounded
            hover:opacity-95">
                        Log Out
                    </button>
                </form>
            @endauth


        </nav>
        <button id="hamburger" @click='open = !open'
            class="flex md:hidden items-center text-white
        transition duration-1000 ease-in-out">
            <i :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex fa-solid fa-bars text-2xl "></i>
            <i :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden fa-solid fa-x text-2xl"></i>
        </button>
    </div>

    <nav id="mobile-menu" :class="{ 'block': open, 'hidden': !open }"
        class="hidden md:hidden bg-blue-900 text-white mt-4 pb-2 space-y-2">
        <x-nav-link routeName="home" :mobile=true>Home</x-nav-link>
        <x-nav-link routeName="jobs.index" :mobile=true>Jobs</x-nav-link>
        @auth
            <x-nav-link routeName="dashboard" :mobile=true>Dashboard</x-nav-link>
            <x-nav-link routeName="saved.index" :mobile=true>Saved</x-nav-link>
        @endauth

        @guest
            <x-nav-link routeName="login" :mobile=true>Log In</x-nav-link>
            <x-nav-link routeName="register" :mobile=true>Register</x-nav-link>
        @endguest
        @auth
            <a href={{ route('jobs.create') }}
                class="block bg-yellow-500 hover:bg-yellow-600 text-black 
            font-medium  px-4 py-2 
            hover:opacity-95">
                <i class="fa-solid fa-pen-to-square"></i>
                Create Job
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="bg-red-500 hover:bg-red-600 text-white 
            font-medium  px-4 py-2 rounded
            hover:opacity-95">
                    Log Out
                </button>
            </form>

        @endauth

    </nav>
</header>
