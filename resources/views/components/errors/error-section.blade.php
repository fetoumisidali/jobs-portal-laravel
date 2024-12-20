@props(['code','message','description'])

<section class="bg-white dark:bg-gray-900 flex-grow content-center items-center">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl  text-blue-900">{{$code}}</h1>
                <p class="mb-4 text-3xl tracking-tight 
                font-bold text-gray-900 md:text-4xl dark:text-white">{{$message}}</p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">
                    {{$description}}
                </p>
                <a href="{{ route('home') }}"
                    class="inline-flex text-white
             bg-blue-900 hover:bg-opacity-90
              focus:ring-4 focus:outline-none
               focus:ring-primary-300
                font-medium rounded-lg 
                text-sm px-5 py-2.5
                 text-center
                  dark:focus:ring-primary-900 my-4">Back
                    to Homepage</a>
            </div>
        </div>
    </section>