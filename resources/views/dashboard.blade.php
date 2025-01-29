<x-app-layout class="bg-black min-h-screen">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-6 items-center py-12">
        <!-- First Text -->
        <div class="text-gray-300 text-lg leading-relaxed">
            <h2 class=" text-center text-white font-bold text-3xl mb-4">
                {{ __('Welcome to PAWDOPT') }}
            </h2>
            <p>
                Whether you’re looking for a playful puppy, a cuddly kitten, or a calm senior companion, we’re here to guide you every step of the way.
            </p>
        </div>

        <!-- First Card -->
        <div class="w-full max-w-lg border border-gray-300 rounded-lg shadow p-6 mx-auto">
            <a href="#">
                <img class="rounded-t-lg w-full h-48 object-cover" src="{{ URL('images/catscard.jpg') }}" alt="Pet Adoption">
            </a>
            <div class="p-4">
                <a href="#">
                    <h5 class="mb-3 text-xl font-bold tracking-tight text-gray-800">
                        Adopt Cats
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-600">
                Adopting a cat means welcoming a charming and independent companion into your home.
                </p>
                <a 
                    href="{{ route('adopt') }}" 
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Adopt Now
                   
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-6 items-center py-12">
        <!-- Second Card -->
        <div class="w-full max-w-lg bg-gray-100 border border-gray-300 rounded-lg shadow p-6 mx-auto order-last lg:order-first">
            <a href="#">
                <img class="rounded-t-lg w-full h-48 object-cover" src="{{ URL('images/dogcard.webp') }}" alt="Pet Adoption">
            </a>
            <div class="p-4">
                <a href="#">
                    <h5 class="mb-3 text-xl font-bold tracking-tight text-gray-800">
                        Adopt Dogs
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-600">
                Adopting a dog is more than bringing home a pet; it's gaining a loyal companion who offers unconditional love and joy.
                </p>
                <a 
                    href="{{ route('adopt') }}" 
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Adopt Now
                    
                </a>
            </div>
        </div>

        <!-- Second Text -->
        <div class="text-gray-300 text-lg leading-relaxed">
            <h2 class="text-white font-bold text-3xl mb-4">
                {{ __('Find Your Pawfect Companion') }}
            </h2>
            <p>
                Explore our wide range of pets and connect with the one that captures your heart. Every adoption saves a life and creates a bond of unconditional love.
            </p>
        </div>
    </div>

    

<footer class="m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
        <i class="fa-solid fa-paw fa-2xl">  PAWDOPT</i>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 PawDopt™. All Rights Reserved.</span>
    </div>
</footer>


    
</x-app-layout>
