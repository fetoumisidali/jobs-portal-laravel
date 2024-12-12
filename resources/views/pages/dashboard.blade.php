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
                        <x-inputs.text id="name" name="name" label="Name" value="{{ $user->name }}" />
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
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    Enter Password to Delete Account
                                </label>
                                <input type="password" name="password" id="password" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm" />
                            </div>

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
                    <div class="m-3 flex items-center justify-between">
                        <div>
                            <p class="text-lg">{{ $job->title }}</p>
                            <p class="font-bold text-sm text-gray-600">{{ $job->job_type }}</p>
                        </div>

                        <div class="flex space-x-2">
                            <a href={{ route('jobs.edit', ['job' => $job]) }}
                                class="bg-blue-500 px-4 py-2 rounded text-white
                        hover:opacity-90">
                                Edit
                            </a>
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
                        <div class="flex justify-between md:justify-start items-center  space-x-3">
                            <h3 class="text-lg">No Available Job</h3>
                            <a class="px-4 py-2 text-white
                         bg-blue-700 font-semibold hover:bg-blue-900
                         shadow-lg rounded-lg"
                                href="{{ route('jobs.create') }}">
                                Create Job
                            </a>
                        </div>
                    </div>
                @endforelse

                <div class="my-6">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
