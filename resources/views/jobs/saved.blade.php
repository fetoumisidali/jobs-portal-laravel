<x-app-layout>
    <x-slot name="title">
        Saved Jobs
    </x-slot>

    <div class="mt-3">
        <h1 class="text-3xl mb-3 mx-3 md:mx-0">Saved Jobs</h1>
        <div class="grid grid-cols-1 gap-3 md:grid-cols-3 ">
            @forelse($jobs as $job)
                <x-job-card :job=$job />
            @empty
                <h3 class="text-xl md:mx-0 mx-3">No Saved Jobs</h3>
            @endforelse
        </div>
        <div class="my-6">
            {{ $jobs->links() }}
        </div>
    </div>



</x-app-layout>
