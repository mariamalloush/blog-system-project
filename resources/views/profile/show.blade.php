<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            My Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- User Information -->
                <div>
                    <h3 class="text-3xl font-bold text-primary mb-4">Profile</h3>
                    <p class="text-lg text-gray-600"><strong>Name:</strong> {{ $user->name }}</p>
                    <p class="text-lg text-gray-600"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="text-lg text-gray-600"><strong>Registered Since:</strong> {{ $user->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
