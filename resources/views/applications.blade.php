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
                    <a href="{{ route('applicationedit') }}" class="flex items-center gap-2 bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Edit
                    </a>
                        <form action="" method="GET" class="flex items-center space-x-2">
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
                                <th class="py-3 px-4 border border-gray-300 text-left">Pet Type</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Reason</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Status</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Due Date</th>
                                <th class="py-3 px-4 border border-gray-300 text-left">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($application as $application)
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
                                    <td class="py-3 px-4 border border-gray-300">{{ $application->created_at->format('F j, Y') }}</td>
                                </tr>
                            @endforeach

                            <!-- If no applications are found -->
                            
                        </tbody>
                    </table>

                    <!-- Pagination -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
