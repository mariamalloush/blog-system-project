<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            All Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Create Post Button -->
                <a href="{{ route('posts.create') }}" class="bg-primary hover:bg-primary-700 text-white font-bold py-2 px-4 rounded mb-6">
                    Create New Post
                </a>

                <!-- Post List -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($posts as $post)
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h2 class="text-xl font-bold text-primary mb-2">{{ $post->title }}</h2>
                            <p class="text-gray-600">{{ Str::limit($post->description, 100) }}</p>
                            <p class="text-sm text-gray-500 mt-2">Created At: {{ $post->created_at->format('d M Y') }}</p>

                            <!-- Actions -->
                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('posts.show', $post->id) }}" class="bg-secondary hover:bg-secondary-700 text-white font-bold py-2 px-4 rounded">
                                    View
                                </a>
                                @if(auth()->id() === $post->user_id)
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
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $posts->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
