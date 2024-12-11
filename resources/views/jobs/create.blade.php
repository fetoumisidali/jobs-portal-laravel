<x-app-layout>
    <x-slot name="title">
        Create Job
    </x-slot>

    <div class="w-full md:max-w-3xl p p-8 mx-auto bg-white md:rounded md:shadow">
        <h2 class="text-4xl text-center font-bold mb-4">Create Job</h2>
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <h2 class="mb-6 font-bold text-2xl text-center text-gray-500">
                Job Info
            </h2>
            <x-inputs.text id="title" name="title" label="Job Title" placeholder="ex: laravel developer"  />

            <div class="mb-4">
                <label class="block text-gray-700" for="description">Job Description</label>
                <textarea name="description" id="description" cols="30" rows="6"
                    class="
                    @error('description') border-2 border-red-500 @enderror
                    w-full px-4 py-2 border rounded focus:outline-none resize-none"
                    placeholder="We are looking for a young laravel developer..."
                    >{{old('description')}}</textarea>
                @error('description')
                    <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="remote">Remote</label>
                <x-inputs.checkbox label="Yes" id="yes" name="remote" value=1 />
                <x-inputs.checkbox label="No" id="no" name="remote" value=0 />
                @error('remote')
                    <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>


            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="job_type">Job type</label>
                <x-inputs.checkbox label="Full Time" id="full-time"
                name="job_type" value="Full Time" />
                <x-inputs.checkbox
                 label="Part time" id="part-time"
                  name="job_type" value="Part time" />
                <x-inputs.checkbox
                 label="Contract" id="contract"
                  name="job_type" value="Contract" />
                <x-inputs.checkbox
                 label="Internship" id="internship"
                  name="job_type" value="Internship" />
                @error('job_type')
                        <span class="text-sm text-red-500">{{$message}}</span>
                @enderror
            </div>

            <x-inputs.text id="salary" name="salary" label="Salary" type="number" placeholder="90,000"  />

            <x-inputs.text id="category" name="category" label="Job Category"
            placeholder="example : it" />

            <x-inputs.text id="location" name="location" label="Job Location"
            placeholder="example : Algeria" />


            <x-inputs.text id="requirements" name="requirements" label="Job Requirements"
            placeholder="example: html, css, javascript, laravel..." />



            <h2 class="mb-6 font-bold text-2xl text-center text-gray-500">
                Company Info
            </h2>

            <x-inputs.text id="company_email" name="contact_email" label="Company Email" type="email"
                placeholder="company.name@example.com"  />


            <x-inputs.text id="company_email" name="company_name" label="Company Name" 
                placeholder="example: Meta"  />

            
                
            <button type="submit" class="bg-green-500 w-full px-4 py-2 my-3 font-bold text-white
            rounded focus:outline-none hover:opacity-90 shadow">
                Save
            </button>
        </form>
    </div>


</x-app-layout>
