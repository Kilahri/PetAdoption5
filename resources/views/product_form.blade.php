<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 text-center">
                        {{ isset($product) ? 'Edit Pet Details' : 'Add New Pet' }}
                    </h3>
                </div>

                <div class="p-6">
                    <!-- Image Preview -->
                    <div class="mb-4">
                        <img id="productImagePreview" src="#" alt="Image Preview" class="w-32 h-32 object-cover rounded-md border border-gray-300 hidden">
                    </div>

                    <form method="POST" action="{{ isset($product) ? route('product.update', $product->product_id) : route('product.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @isset($product)
                            @method('PUT')
                        @endisset

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Image Upload -->
                            <div>
                                <label for="product_image" class="block text-sm font-medium text-gray-700">Pet Image</label>
                                <input 
                                    type="file" 
                                    id="product_image" 
                                    name="product_image" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-600 focus:ring focus:ring-gray-600 sm:text-sm">
                            </div>

                            <!-- Pet Name -->
                            <div>
                                <label for="product_name" class="block text-sm font-medium text-gray-700">Pet Name</label>
                                <input 
                                    type="text" 
                                    id="product_name" 
                                    name="product_name" 
                                    value="{{ isset($product) ? $product->product_name : old('product_name') }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-600 focus:ring focus:ring-gray-600 sm:text-sm">
                            </div>

                            <!-- Pet Type -->
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Pet Type</label>
                                <select 
                                    id="category" 
                                    name="category" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-600 focus:ring focus:ring-gray-600 sm:text-sm">
                                    <option disabled selected>Select Type</option>
                                    @foreach ($categories as $index => $category)
                                        <option value="{{ $category->category_id }}" 
                                            {{ isset($product) && $product->category_id == $category->category_id ? 'selected' : '' }}>
                                            {{ $index + 1 }}. {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700">Adoption Fee</label>
                                <input 
                                    type="number" 
                                    id="price" 
                                    name="price" 
                                    value="{{ isset($product) ? $product->price : old('price') }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-600 focus:ring focus:ring-gray-600 sm:text-sm">
                            </div>
                        </div>

                        <div class="mt-4 flex justify-end">
                            <button 
                                type="submit" 
                                class="inline-flex justify-center py-2 px-4 bg-blue-600 text-white text-sm font-medium rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                {{ isset($product) ? 'Update Pet' : 'Add Pet' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('product_image').addEventListener('change', function(event) {
            const input = event.target;
            const preview = document.getElementById('productImagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        });
    </script>
</x-app-layout>
