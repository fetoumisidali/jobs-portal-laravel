<x-app-layout>
    <x-slot name="title">
        Register
    </x-slot>

    <div class="w-full mt-36 flex justify-center content-center items-center">
        <div class="w-full py-20 md:max-w-lg p p-8  bg-white md:rounded md:shadow-lg">
            <h2 class="text-4xl text-center font-bold mb-4">Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <x-inputs.text type="name" id="name" name="name" label="Name" placeholder="enter you email" />
                <x-inputs.text type="email" id="email" name="email" label="Email" placeholder="enter you email" />
                <x-inputs.text type="password" id="password" name="password" label="Password" placeholder="enter you password" />
                <button type="submit"
                    class="bg-black px-4 py-2 my-3 font-bold text-white
            rounded focus:outline-none hover:opacity-90 shadow">
                    Register
                </button>
            </form>
        </div>
    </div>


</x-app-layout>
