<x-app-layout>
    <x-slot name="title">
        Jobs
    </x-slot>

    <div class="mt-3">
        <h1 class="text-3xl mb-3">All Jobs</h1>
        <div class="grid grid-cols-1 gap-3 md:grid-cols-3 ">
            @forelse($jobs as $job)
                <x-job-card :job=$job />
            @empty
                <h2 class="text-2xl">No Jobs</h2>
            @endforelse
        </div>
        <div class="my-6">
            {{ $jobs->links() }}
        </div>
    </div>



</x-app-layout>
