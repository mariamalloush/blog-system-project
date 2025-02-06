<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Post Details -->
                <p class="text-lg text-gray-600">{{ $post->description }}</p>
                <p class="text-sm text-gray-500 mt-4">Created At: {{ $post->created_at->format('d M Y') }}</p>

                <!-- Actions -->
                <div class="mt-6 flex space-x-2">
                    <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded @if(auth()->id() !== $post->user_id) hidden @endif">
                        Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block @if(auth()->id() !== $post->user_id) hidden @endif">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-danger hover:bg-danger-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
