<x-app-layout>
    <x-slot name="title">
        {{ $job->title }} applicants
    </x-slot>


    <div>
        <h1 class="text-3xl my-6">{{ $job->title }} Applicants:</h1>

        @if ($applicants->isNotEmpty())
            <div class="my-6">
                <table class="w-2/3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-scroll">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                FullName
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PhoneNumber
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span>Message</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($applicants as $applicant)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $applicant->full_name }}
                                </th>
                                <td class="px-6 py-4 text-left">
                                    {{ $applicant->email }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    {{ $applicant->phone_number }}
                                </td>
                                <td class="px-6 py-4">
                                    <button x-data
                                        x-on:click="$dispatch('open-modal', 'message-modal-{{ $applicant->id }}')"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <i class="fa-regular fa-eye"></i>
                                        Message
                                    </button>

                                    <x-modal name="message-modal-{{ $applicant->id }}">
                                        <h1 class="text-lg text-black">{{ $applicant->full_name }} Message :</h1>
                                        <textarea class="bg-gray-200 rounded font-medium w-full my-3 p-3 resize-none" cols="30" rows="6" disabled>{{ $applicant->message }}</textarea>

                                        <button
                                            x-on:click="$dispatch('close-modal', 'message-modal-{{ $applicant->id }}')"
                                            class="px-4 py-2 bg-gray-500 text-white rounded hover:opacity-90">
                                            Close
                                        </button>
                                    </x-modal>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="w-2/3 my-3">
                    {{$applicants->links()}}
                </div>
            @else
                <h1 class="text-3xl my-6">No Applicants</h1>

        @endif
    </div>
    </div>




</x-app-layout>
