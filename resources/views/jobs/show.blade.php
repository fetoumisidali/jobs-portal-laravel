<x-app-layout>
    <x-slot name="title">
        Job Details
    </x-slot>
    <div class="grid grid-col-1 md:grid-cols-3 gap-6">
        <section class="md:col-span-2">
            <div class="rounded p-6 bg-white md:shadow">
                <div class="flex justify-between items-center">
                    <a href={{ url()->previous() != url()->current() ? url()->previous() : route('jobs.index') }}
                        class="text-blue-700
                     hover:text-blue-500 hover:scale-95">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                        Go Back
                    </a>
                    <div class="flex space-x-3">
                        @can('update', $job)
                            <a href={{ route('jobs.edit', ['job' => $job]) }}
                                class="bg-blue-500 px-4 py-2 rounded text-white
                        hover:opacity-90">
                                Edit
                            </a>
                        @endcan
                        @can('delete', $job)
                            <form method="POST" onsubmit="return confirm('Are You Sure ?')"
                                action="{{ route('jobs.destroy', ['job' => $job]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 px-4 py-2 rounded text-white
                        hover:opacity-90">
                                    Delete
                                </button>
                            </form>
                        @endcan

                    </div>

                </div>
                <div class="p-4">
                    <h2 class="font-semibold">
                        {{ $job->title }}
                    </h2>
                    <p class="mt-2 text-gray-600 text-lg">
                        {{ $job->description }}
                    </p>
                    <ul class="my-4 p-4 bg-gray-100">
                        <li class="mb-2">
                            <strong>Posted By: </strong>
                            <a class="text-blue-500 hover:text-blue-700"
                                href="{{ route('jobs.user_jobs', ['username' => $job->user->username]) }}">{{ $job->user->username }}</a>
                        </li>
                        <li class="mb-2">
                            <strong>Job Type: </strong>
                            {{ $job->job_type }}
                        </li>
                        <li class="mb-2">
                            <strong>Salary: </strong>
                            ${{ number_format($job->salary) }}
                        </li>
                        <li class="mb-2">
                            <strong>Remote: </strong>
                            {{ $job->remote ? 'Yes' : 'No' }}
                        </li>
                        <li class="mb-2">
                            <strong>Location: </strong>
                            {{ $job->location }}
                        </li>
                        <li>
                            <strong>Requirements: </strong>
                            {{ ucwords(str_replace(',', ', ', $job->requirements)) }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container mx-auto p-4 ">
                <h2 class="text-xl font-semibold mb-4">Job Details</h2>
                <div class="bg-white md:shadow p-4 rounded">
                    <h3 class="text-lg font-semibold mb-2 text-blue-500">
                        Job Requirement
                    </h3>
                    <p>
                        {{ $job->description }}
                    </p>

                    {{-- todo --}}

                    <h3 class="text-lg font-semibold mt-4 mb-2 text-blue-500">
                        Another title
                    </h3>
                    <p>
                        Here Another Title For Other Data
                    </p>
                </div>

                @auth
                    @can('apply', $job)
                        <button x-data='' x-on:click="$dispatch('open-modal', 'apply-modal')"
                            class="m-4 shadow-sm text-center text-base font-medium
                text-indigo-700 block w-full px-5 py-2.5 bg-indigo-100
                hover:bg-indigo-200">
                            Apply
                        </button>
                        <x-modal name="apply-modal" :show="$errors->any()">
                            <form action="{{ route('applicant.store',['job' => $job]) }}" method="POST">
                                @csrf
                                <h1 class="text-lg text-black mb-3">Apply For <strong>{{ $job->title }}</strong></h1>
                                <x-inputs.text id="full_name" name="full_name" label="Full Name"
                                    placeholder="enter your full name" required />
                                <x-inputs.text type="email" id="email" name="email" label="Email"
                                    placeholder="enter your email" required />
                                <x-inputs.text type="phone_number" id="phone_number" name="phone_number" label="phone Number"
                                    placeholder="enter your phone number" required />
                                <div class="mb-4">
                                    <textarea class="w-full focus:outline-none
                                 border rounded p-3 resize-none"
                                        placeholder="write your message here"
                                         name="message" id="message" cols="30" rows="6" required></textarea>
                                    @error('message')
                                        <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex space-x-3">
                                    <button type="button" x-on:click="$dispatch('close-modal', 'apply-modal')"
                                        class="py-2 px-4 bg-red-500 rounded text-white hover:opacity-90">
                                        Cancel
                                    </button>
                                    <button type="submit" class="py-2 px-4 bg-blue-500 rounded text-white hover:opacity-90">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </x-modal>
                    @endcan
                @else
                    <div
                        class="m-4 shadow-sm text-center text-base font-medium
                text-black block w-full px-5 py-2.5 bg-white">
                        You Must <a class="text-blue-500 hover:text-blue-900" href="{{ route('register') }}">Register</a>
                        or
                        <a class="text-blue-500 hover:text-blue-900" href="{{ route('login') }}">Log In</a> to apply
                    </div>
                @endauth



            </div>

        </section>
        <aside class="p-3 order-first md:order-last bg-white rounded md:shadow h-min">
            <h1 class="text-xl mb-3 text-center font-bold">Company Info</h1>
            <img class="w-48 mx-auto mb-4" src="/images/logo.png" alt="">
            <h4 class="text-lg font-bold">{{ $job->company_name }}</h4>
            <p class="text-gray-700 text-lg my-1">
                Here Some information's About The Company
            </p>

            @auth
                <form
                    action="{{ auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists()
                        ? route('saved.destroy', ['job' => $job])
                        : route('saved.store', ['job' => $job]) }}"
                    method="POST">
                    @csrf
                    @if (auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists())
                        @method('DELETE')
                        <button type="submit" href=""
                            class="block font-bold mx-2
             rounded-full mt-10 bg-red-500 hover:bg-red-700 text-white text-center py-3 px-4"
                            href="">
                            <i class="fa-regular fa-bookmark mr-2"></i>
                            Remove Bookmark
                        </button>
                    @else
                        <button type="submit" href=""
                            class="block font-bold mx-2
             rounded-full mt-10 bg-blue-700 hover:bg-blue-800 text-white text-center py-3 px-4"
                            href="">
                            <i class="fa-regular fa-bookmark mr-2"></i>
                            Bookmark This Job
                        </button>
                    @endif
                </form>
            @endauth

        </aside>
    </div>
</x-app-layout>
