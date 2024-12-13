<section class="hero  relative h-96 mx-auto flex items-center bg-cover bg-center">
    <div class="overlay"></div>
    <div class="container mx-auto text-center z-10">
        <h2 class="text-5xl text-white mb-8 font-semibold">Search For Job</h2>
        <form action="{{route("jobs.index")}}" method="GET" class="mx-5 space-y-3  md:space-x-3 ">
            <input name="title" placeholder="title" type="text" class="border-2
             px-4 py-2 
             focus:outline-none w-full md:w-72">
            <input name="location" placeholder="location" type="text" class="border-2
             px-4 py-2 
             focus:outline-none w-full md:w-72">
             <button class="bg-blue-600 w-full md:w-auto text-white px-4 py-2.5">
               <i class="fa-solid fa-magnifying-glass mr-1"></i> Search
             </button>
        </form>
    </div>
</section>