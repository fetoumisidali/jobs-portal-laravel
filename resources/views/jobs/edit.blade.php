<x-app-layout>
    <x-slot name="title">
        Edit Job
    </x-slot>

    <div class="w-full md:max-w-3xl p p-8 mx-auto bg-white md:rounded md:shadow">
        <h2 class="text-4xl text-center font-bold mb-4">Edit Job</h2>
        <form action="{{ route('jobs.update' , ['job' => $job]) }}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="mb-6 font-bold text-2xl text-center text-gray-500">
                Job Info
            </h2>
            <x-inputs.text 
            :value="old('title',$job->title)"
            id="title" 
            name="title" label="Job Title" placeholder="ex: laravel developer"  />

            <div class="mb-4">
                <label class="block text-gray-700" for="description">Job Description</label>
                <textarea name="description" id="description" cols="30" rows="6"
                    class="
                    @error('description') border-2 border-red-500 @enderror
                    w-full px-4 py-2 border rounded focus:outline-none resize-none"
                    placeholder="We are looking for a young laravel developer..."
                    >{{old('description',$job->description)}}</textarea>
                @error('description')
                    <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="remote">Remote</label>
                <x-inputs.checkbox  name="remote" 
                :chosen="old('remote',$job->remote)"
                :choices="['Yes' => true,'No' => false]" />
                @error('remote')
                    <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>


            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="job_type">Job type</label>
                <x-inputs.checkbox name="job_type" 
                :chosen="old('job_type',$job->job_type)"
                :choices="[
                'Full Time' => 'Full Time',
                'Part time' => 'Part time',
                'Contract' => 'Contract',
                'Internship' => 'Internship'
                ]" />

                @error('job_type')
                        <span class="text-sm text-red-500">{{$message}}</span>
                @enderror
            </div>

            <x-inputs.text :value="old('salary',$job->salary)" id="salary" name="salary" label="Salary" type="number" placeholder="90,000"  />

            <x-inputs.text :value="old('category',$job->category)" id="category" name="category" label="Job Category"
            placeholder="example : it" />

            <x-inputs.text :value="old('location',$job->location)"  id="location" name="location" label="Job Location"
            placeholder="example : Algeria" />


            <x-inputs.text :value="old('requirements',$job->requirements)" id="requirements" name="requirements" label="Job Requirements"
            placeholder="example: html, css, javascript, laravel..." />



            <h2 class="mb-6 font-bold text-2xl text-center text-gray-500">
                Company Info
            </h2>

            <x-inputs.text :value="old('contact_email',$job->contact_email)" id="contact_email" name="contact_email" label="Company Email" type="email"
                placeholder="company.name@example.com"  />


            <x-inputs.text :value="old('company_name',$job->company_name)"  id="company_name" name="company_name" label="Company Name" 
                placeholder="example: Meta"  />

            
                
            <button type="submit" class="bg-green-500 w-full px-4 py-2 my-3 font-bold text-white
            rounded focus:outline-none hover:opacity-90 shadow">
                Update
            </button>
        </form>
    </div>


</x-app-layout>
