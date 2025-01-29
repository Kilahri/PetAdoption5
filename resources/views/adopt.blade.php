<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Header Section -->
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 text-center">
                        Adopt Cats and Dogs
                    </h3>
                </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <header class="p-4 flex justify-between items-center">
                    <form action="" method="GET" class="flex items-center space-x-2">
                        <input
                            type="text"
                            name="search"
                            class="form-input border border-gray-400 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Search pet..."
                            value="{{ request('search') }}">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">Search</button>
                    </form>
                </header>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($adopt as $product)
                        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg transform hover:scale-105 hover:shadow-2xl transition duration-300">
                            <div class="h-56 w-full bg-gray-100 rounded-t-lg overflow-hidden flex items-center justify-center">
                                <img class="object-contain max-h-full max-w-full" src="{{ asset('storage/Uploads/Product Images/' . $product->product_image) }}" alt="{{ $product->product_name }}" />
                            </div>
                            <div class="px-5 py-4">
                                <a href="#">
                                    <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->product_name }}</h5>
                                </a>
                                <p class="text-gray-600 dark:text-gray-400">{{ $product->category->category_name }}</p>
                                <div class="flex items-center justify-between mt-4">
                                    <span class="text-2xl font-bold text-gray-900 dark:text-white">₱{{ $product->price }}</span>
                                    <a 
                                        href=" {{route('application.create')}}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Adopt Me
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @if (session('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                showToast("{{ session('type') }}", "{{ session('message') }}");
            });
        </script>
    @endif

    <footer class="m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <i class="fa-solid fa-paw fa-2xl"> PAWDOPT</i>
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
