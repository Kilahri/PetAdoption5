<x-app-layout>
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
                    <a href="{{ route('product.create') }}" class="flex items-center gap-2 bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add Pet
                    </a>
                </header>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
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

                                    
                                    <div class="flex space-x-2">
                                        <a href="{{ route('product.edit', $product->product_id) }}" class="text-white bg-gray-800 hover:bg-gray-600 py-2 px-4 rounded-lg transition duration-300">
                                            Edit
                                        </a>
                                        <form action="{{ route('product.delete', $product->product_id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 py-2 px-4 rounded-lg transition duration-300"
                                                onclick="return confirm('Are you sure you want to delete this product?');">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
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
