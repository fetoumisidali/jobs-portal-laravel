@props([
    'applicant' => [],
    'editable' => false,
])

<div class="space-y-4 mb-4">
    {{-- Full Name --}}
    <x-inputs.text 
        id="full_name" 
        name="full_name" 
        label="Full Name" 
        placeholder="Enter your full name" 
        :value="old('full_name', $applicant['full_name'] ?? '')" 
        :disabled="!$editable" 
        {{-- required  --}}
    />

    {{-- Email --}}
    <x-inputs.text 
        id="email" 
        name="email" 
        type="email" 
        label="Email" 
        placeholder="Enter your email" 
        :value="old('email', $applicant['email'] ?? '')" 
        :disabled="!$editable" 
        required 
    />

    {{-- Phone Number --}}
    <x-inputs.text 
        id="phone_number" 
        name="phone_number" 
        type="text" 
        label="Phone Number" 
        placeholder="Enter your phone number" 
        :value="old('phone_number', $applicant['phone_number'] ?? '')" 
        :disabled="!$editable" 
        required 
    />

    {{-- Message --}}
    <div class="mb-4">
        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
        <textarea 
            cols="30" rows="6" required
            id="message" 
            name="message" 
            rows="4" 
            placeholder="Write your message here" 
            {{ $editable ? '' : 'disabled' }} 
            class="block w-full border p-3 resize-none focus:outline-none border-gray-300 rounded-md shadow-sm
              sm:text-sm
              disabled:bg-gray-100
           disabled:font-semibold"
        >{{ old('message', $applicant['message'] ?? '') }}</textarea>
        @error('message')
            <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
        @enderror
    </div>
</div>