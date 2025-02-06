<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            My Account
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- User Information -->
                <div class="mb-8">
                    @if($user)
                        <h3 class="text-3xl font-bold text-primary mb-4">Welcome, {{ $user->name }}!</h3>
                        <p class="text-lg text-gray-600"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="text-lg text-gray-600"><strong>Registered Since:</strong> {{ $user->created_at->format('d M Y') }}</p>
                        <p class="text-lg text-gray-600"><strong>Total Posts:</strong> {{ $userPosts->total() }}</p>
                    @else
                        <p class="text-red-600 font-bold">User data not found.</p>
                    @endif
                </div>

                <!-- Recent Posts -->
                <div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Your Recent Posts</h3>

                    @if($userPosts->isEmpty())
                        <p class="text-gray-600">You haven't created any posts yet.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($userPosts as $post)
                                <div class="bg-white shadow-md rounded-lg p-6">
                                    <h4 class="text-xl font-bold text-primary mb-2">{{ $post->title }}</h4>
                                    <p class="text-gray-600">{{ Str::limit($post->description, 100) }}</p>
                                    <p class="text-sm text-gray-500 mt-2">Created At: {{ $post->created_at->format('d M Y') }}</p>

                                    <!-- Actions -->
                                    <div class="mt-4 flex space-x-2">
                                        <a href="{{ route('posts.show', $post->id) }}" class="bg-secondary hover:bg-secondary-700 text-white font-bold py-2 px-4 rounded">
                                            View
                                        </a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                                            Edit
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="bg-danger hover:bg-danger-700 text-white font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $userPosts->links('pagination::tailwind') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
