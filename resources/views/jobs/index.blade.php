<x-app-layout>
    <x-slot name="title">
        Jobs
    </x-slot>

    <div class="mt-3">
        <h1 class="text-3xl mb-3 mx-3 md:mx-0">All Jobs</h1>
        <div class="grid grid-cols-1 gap-3 md:grid-cols-3 ">
            @forelse($jobs as $job)
                <x-job-card :job=$job />
            @empty
                <div
                    class="
                h-full
                md:col-span-3 flex flex-col space-y-6 items-center justify-center content-center">
                    <img class="h-96" src="/images/illustrators/no-data.svg" alt="">
                    @auth
                        <a href={{ route('jobs.create') }}
                        class="bg-blue-900 hover:opacity-90  text-white 
                                    font-medium  px-4 py-2 rounded">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Create
                    </a>
                    @endauth
                    
                </div>
            @endforelse
        </div>
        <div class="my-6">
            {{ $jobs->links() }}
        </div>
    </div>



</x-app-layout>
