<header x-data="{ 'open': false }" class="bg-blue-900 text-white p-4">
    <div class="container mx-auto justify-between flex items-center ">
        <h1 class="cursor-pointer select-none text-3xl font-semibold">Jobs Portal</h1>
        <nav class="hidden md:flex space-x-4 items-center">
            <x-nav-link routeName="home">Home</x-nav-link>
            <x-nav-link routeName="jobs.index">Jobs</x-nav-link>
            <a href=""
                class="text-white py-2 border-b-2 border-b-transparent
             hover:border-b-2 hover:border-b-white">Dashboard</a>
            <a href=""
                class="text-white py-2 border-b-2 border-b-transparent
             hover:border-b-2 hover:border-b-white ">Log
                In</a>
            <a href=""
                class="text-white py-2 border-b-2 border-b-transparent
             hover:border-b-2 hover:border-b-white">Register</a>
            <a href={{ route('jobs.create') }}
                class="bg-yellow-500 hover:bg-yellow-600 text-black 
            font-medium  px-4 py-2 rounded
            hover:opacity-95">
                <i class="fa-solid fa-pen-to-square"></i>
                Create Job
            </a>
        </nav>
        <button id="hamburger" @click='open = !open'
            class="flex md:hidden items-center text-white
        transition duration-1000 ease-in-out">
            <i :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex fa-solid fa-bars text-2xl "></i>
            <i :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden fa-solid fa-x text-2xl"></i>
        </button>
    </div>

    <nav id="mobile-menu"  :class="{ 'block': open, 'hidden': !open }"
        class="hidden md:hidden bg-blue-900 text-white mt-4 pb-2 space-y-2">
        <x-nav-link routeName="home" :mobile=true>Home</x-nav-link>
        <x-nav-link routeName="jobs.index" :mobile=true>Jobs</x-nav-link>
        <a href="" class="block px-4 py-2 hover:bg-blue-800">Dashboard</a>
        <a href="" class="block px-4 py-2 hover:bg-blue-800">Log In</a>
        <a href="" class="block px-4 py-2 hover:bg-blue-800">Register</a>
        <a href={{ route('jobs.create') }}
            class="block bg-yellow-500 hover:bg-yellow-600 text-black 
            font-medium  px-4 py-2 
            hover:opacity-95">
            <i class="fa-solid fa-pen-to-square"></i>
            Create Job
        </a>
    </nav>
</header>
