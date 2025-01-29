<!--<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center text-2xl font-bold text-black">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                @if(session("message"))
                    <p class="text-center text-gray-700">{{ session("message") }}</p>
                @endif
                <div class="p-6 text-gray-900">
                    <div class="table-container">
                        <header class="p-4 flex justify-between items-center">
                            <form action="" method="GET" class="flex items-center space-x-2">
                                <input
                                    type="text"
                                    name="search"
                                    class="form-input border border-gray-300 rounded-lg p-2 mr-2"
                                    placeholder="Search Name"
                                    value="{{ request('search') }}">
                                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
                                    Search
                                </button>
                            </form>
                            
                        </header>

                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 border border-gray-300">Profile</th>
                                    <th class="px-4 py-2 border border-gray-300">Name</th>
                                    <th class="px-4 py-2 border border-gray-300">Email</th>
                                    <th class="px-4 py-2 border border-gray-300">Date Created</th>
                                    <th class="px-4 py-2 border border-gray-300 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="bg-white">
                                    <td class="px-4 py-2 border border-gray-300">
                                        <img src="{{ $user->profile ? asset('storage/Uploads/users-profile/' . $user->profile) : asset('storage/Uploads/users-profile/user.jpg') }}" alt="User Profile" class="w-10 h-10 rounded-full">
                                    </td>
                                    <td class="py-3 px-6 border text-gray-800">{{ $user->name }}</td>
                                    <td class="py-3 px-6 border text-gray-800">{{ $user->email }}</td>
                                    <td class="py-3 px-6 border text-gray-800">{{ $user->created_at->format('F j, Y') }}</td>
                                    <td class="space-x-2 border border-gray-300 text-center">
                                        <a href="{{ route('user.edit', $user->id) }}" class="bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-500 transition duration-300">
                                            Edit
                                        </a>
                                        <form action="{{ route('user.delete', $user->id ) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                title="DELETE"
                                                class="bg-red-600 text-white py-1 px-4 rounded hover:bg-red-500 transition duration-300"
                                                onclick="return confirm('Are you sure you want to delete this user?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> -->
                        <!-- Pagination Links -->
                       <!-- <div class="mt-4">
                            {{ $users->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
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

</x-app-layout> -->
