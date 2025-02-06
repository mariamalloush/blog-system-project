<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            Create New Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('posts.store') }}" method="POST" class="space-y-6 max-w-md">
                    @csrf

                    <!-- Title Field -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm @error('title') border-danger @enderror">
                        @error('title')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm @error('description') border-danger @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-primary hover:bg-primary-700 text-white font-bold py-2 px-4 rounded">
                        Create Post
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
