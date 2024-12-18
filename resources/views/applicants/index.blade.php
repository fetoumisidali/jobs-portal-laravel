<x-app-layout>
    <x-slot name="title">
        My applicants
    </x-slot>


    <div class="md:mx-0 mx-6">
        <h1 class="text-3xl my-6">My Applicants:</h1>
        @if ($applicants->isNotEmpty())
            <table class="w-full md:w-2/3 border-separate rounded  mx-auto divide-y divide-gray-200 border  mt-4">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-bold text-gray-600  tracking-wider">Job</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-bold text-gray-600  tracking-wider">Applicant</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    @foreach ($applicants as $applicant)
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                <a class="text-blue-500 hover:underline"
                                    href={{ route('jobs.show', ['job' => $applicant->job]) }}>
                                    {{ $applicant->job->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                <button x-data x-on:click="$dispatch('open-modal', 'applicant-{{ $applicant->id }}')"
                                    class="text-blue-500 hover:underline">
                                    Show Applicant
                                </button>
                                <x-modal name="applicant-{{ $applicant->id }}">
                                    <h1
                                        class="text-center text-xl
                                font-semibold 
                                 text-black mb-3">
                                        <span class="text-blue-500">{{ $applicant->job->title }}</span>
                                        Applicant</strong>
                                    </h1>
                                    <x-forms.applicant-form :applicant="$applicant" :editable="false" />
                                    <button type="button"
                                        x-on:click="$dispatch('close-modal', 'applicant-{{ $applicant->id }}')"
                                        class="py-2 px-4 bg-gray-500 rounded text-white hover:opacity-90">
                                        Close
                                    </button>
                                </x-modal>
                            </td>
                            <td>
                                <button class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="w-full md:w-2/3 mx-auto my-3">
                {{ $applicants->links() }}
            </div>
        @else
            <h1 class="text-2xl">You Have No Applicants</h1>
        @endif

    </div>



</x-app-layout>
