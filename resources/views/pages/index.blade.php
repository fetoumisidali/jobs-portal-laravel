<x-app-layout>
    <x-slot name="title">
        Home
    </x-slot>

    <h2
        class= "text-center text-3xl mb-4 font-bold border rounded border-gray-300 p-6"
    >Welcome To Jobs Portal</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @forelse($jobs as $job)
                <x-job-card :job=$job />
            @empty
                <h2 class="text-2xl">No Jobs</h2>
            @endforelse
    </div>
    <a class="block text-xl text-center hover:text-gray-500" href="{{route('jobs.index')}}">
       <i class="fa-solid fa-arrow-right-to-bracket mr-2"></i> Show All Jobs
    </a>

</x-app-layout>