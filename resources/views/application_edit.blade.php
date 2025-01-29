<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Header Section -->
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Applications Table
                    </h3>
                </div>

                <!-- Table Section -->
                <div class="p-6">
                    <!-- Search Form -->
                    <header class="flex justify-between items-center mb-4">
                        <form action="{{ isset($application) ?: route('application.store') }}" method="" class="flex items-center space-x-2">
                        @csrf
                        @isset($papplication)
                            @method('PUT')
                        @endisset
                            <input
                                type="text"
                                name="search"
                                class="form-input border border-gray-300 rounded-lg p-2"
                                placeholder="Search Applicant..."
                                value="{{ request('search') }}">
                            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
                                Search
                            </button>
                        </form>
                    </header>

                    <!-- Table -->
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="py-3 px-4 border border-gray-300 text-left">Applicant Name</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Email</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Address</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Pet Name</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Type</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Reason</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Status</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Due Date</th>
                                <th class="px-4 py-2 border border-gray-300 text-left">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicationedit as $application)
                                <tr class="bg-white hover:bg-gray-50 transition">
                                    <td class="py-3 px-4 border border-gray-300">{{ $application->name }}</td>
                                    <td class="py-3 px-4 border border-gray-300">{{ $application->email }}</td>
                                    <td class="py-3 px-4 border border-gray-300">{{ $application->address }}</td>

                                    <!-- Product Details -->
                                     <!-- Check if the application has a product associated -->
                                    <td class="py-3 px-4 border border-gray-300">{{ $application->products->product_name }}</td>
                                    <td class="py-3 px-4 border border-gray-300">{{ $application->products->category->category_name }}</td>
                                    
                                    
                                    

                                    <!-- Application-specific details -->
                                    <td class="py-3 px-4 border border-gray-300">{{ $application->reason }}</td>
                                    <td class="py-3 px-4 border border-gray-300">{{ $application->status }}</td>
                                    <td class="py-3 px-4 border border-gray-300">{{ $application->due_date }}</td>
                                    <td class="space-x-2 border border-gray-300 text-center">
                    
                                        
                                        <form action="{{ route('application.delete', $application->application_id ) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                title="DELETE"
                                                class="bg-red-600 text-white py-1 px-4 rounded hover:bg-red-500 transition duration-300"
                                                onclick="return confirm('Are you sure you want to delete this applicant?');">
                                                Delete
                                            </button>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
