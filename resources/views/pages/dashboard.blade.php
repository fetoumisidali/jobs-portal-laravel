<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <section>
        <div class="grid grid-cols-1 mx-3 md:grid-cols-3 gap-2">
            <div class="p-4 col-span-1 md:rounded-lg md:shadow-xl h-min">
                <h3 class="text-black text-2xl mb-3 text-center">User information's</h3>
                <div class="mx-3">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <x-inputs.text id="username" name="username" label="Username" value="{{ $user->username }}" />
                        <x-inputs.text id="email" name="email" type="email" label="Email address"
                            value="{{ $user->email }}" />
                        <button type="submit"
                            class="w-full bg-green-500 hover:bg-green-600 text-white
                    py-2 rounded font-semibold">
                            Save
                        </button>
                    </form>
                    <hr class="h-px mx-12 my-4 bg-gray-200 border-0">
                    <div class="">
                        <form action="{{ route('profile.destroy') }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete your account? This action is irreversible.')">
                            @csrf
                            @method('DELETE')

                            <!-- Password Confirmation -->
                            <x-inputs.text required type="password" placeholder="Enter password to delete Account"
                                id="password" name="password" label="Password" />

                            <!-- Delete Button -->
                            <button type="submit"
                                class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded font-semibold">
                                <i class="fa-solid fa-circle-exclamation mr-1"></i>
                                Delete Account
                            </button>
                        </form>


                    </div>
                </div>
            </div>

            <div class="p-4 md:col-span-2 md:rounded-lg md:shadow-xl h-min">
                <h3 class="text-2xl m-3">User Jobs</h3>
                @forelse($jobs as $job)
                    <div
                        class="m-3 flex md:flex-row flex-col md:space-y-0 space-y-2  md:space-x-2 ms:items-center items-start justify-between">
                        <div>
                            <a href="{{ route('jobs.show', ['job' => $job]) }}"
                                class="text-lg hover:text-blue-500 hover:underline">{{ $job->title }}</a>
                            <p class="font-bold text-sm text-gray-600">{{ $job->job_type }}</p>
                        </div>

                        <div class="flex space-x-2 ">
                            @can('viewAll', [App\Models\Applicant::class, $job])
                                <div>
                                    <a href="{{ route('jobs.applicants', ['job' => $job]) }}"
                                        class="bg-green-500 px-4 inline-block py-2 rounded text-white
                        hover:opacity-90">
                                        <i class="fa-regular fa-eye"></i>
                                        Applicants
                                    </a>
                                </div>

                                <a href={{ route('jobs.edit', ['job' => $job]) }}
                                    class="bg-blue-500 px-4 inline-block py-2 rounded text-white
                        hover:opacity-90">
                                    Edit
                                </a>
                            @endcan

                            <form method="POST" onsubmit="return confirm('Are You Sure ?')"
                                action="{{ route('jobs.destroy', ['job' => $job]) }}?from=dashboard">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 px-4 py-2 rounded text-white
                        hover:opacity-90">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty

                    <div class="m-3">
                        <h3 class="text-lg">you don't have any job start and
                            <a class="text-blue-700 font-medium hover:text-blue-900" href="{{ route('jobs.create') }}">
                                Create Job
                            </a>
                        </h3>

                    </div>
                @endforelse

                <div class="my-6">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
