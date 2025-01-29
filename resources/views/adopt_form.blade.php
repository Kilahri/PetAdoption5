<x-app-layout>

    <!DOCTYPE html>
<html>
<head>
    <title>Pet Adoption Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center">Pet Adoption Form</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ isset($application) ?: route('application.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    @isset($application)
                        @method('PUT')
                    @endisset


                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') ?: (isset($application) ? $application->name : '') }}"
                            class="mt-1 block w-full rounded-lg shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') ?: (isset($application) ? $application->email : '') }}"
                            class="mt-1 block w-full rounded-lg shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        
                        >
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea
                            name="address"
                            id="address"
                            rows="3"
                            value="{{ old('address') ?: (isset($application) ? $application->address : '') }}"
                            class="mt-1 block w-full rounded-lg shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            required></textarea>
                    </div>

                    
                    <div>
                         <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                    <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date') ?: (isset($application) ? $application->due_date : '') }}"
                    class="mt-1 block w-full rounded-lg shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500"
    >
</div>

                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-700">Reason for Adopting</label>
                        <textarea
                            name="reason"
                            id="reason"
                            rows="3"
                            value="{{ old('reason') ?: (isset($application) ? $application->reason : '') }}"
                            class="mt-1 block w-full rounded-lg shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            required></textarea>
                    </div>

                    <div class="flex justify-end">
                    <div class="mt-4 flex justify-end">
                            <button 
                                type="submit" 
                                class="inline-flex justify-center py-2 px-4 bg-blue-600 text-white text-sm font-medium rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                {{ isset($application) ? 'Update Application' : 'Add Applicants' }}
                            </button>
                    </div>
                </form>
</div>
</body>
</html>


    </x-app-layout>