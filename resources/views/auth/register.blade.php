<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm @error('name') border-danger @enderror">
            @error('name')
                <p class="text-sm text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mt-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm @error('email') border-danger @enderror">
            @error('email')
                <p class="text-sm text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="mt-4 relative">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm @error('password') border-danger @enderror">
            @error('password')
                <p class="text-sm text-danger mt-1">{{ $message }}</p>
            @enderror

            <!-- Show Password Toggle -->
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="w-5 h-5 text-gray-400 cursor-pointer"
                    style="position: relative; top: 12px;"
                    id="password-toggle-icon"
                    onclick="togglePasswordVisibility()"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.94-9.543-7a9.97 9.97 0 011.563-3.028m5.878.908c1.563-.586 3.668-.878 5.932-.878 2.265 0 4.368.292 6.082.877m-5.932 3.824A6.009 6.009 0 0112 3c-2.991 0-5.724 1.932-6.647 4.667m12.923-.647a1 1 0 00-1.414-1.414l-3.162-3.162a1 1 0 00-1.414 1.414l3.162 3.162zm-9.841 3.162a3 3 0 000 4.243c1.412 0 2.764-.586 3.723-1.568m-3.723-1.568a3 3 0 00-4.243 0"></path>
                </svg>

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="w-5 h-5 text-gray-400 cursor-pointer hidden"
                    id="password-visible-icon"
                    onclick="togglePasswordVisibility()"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 15a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"
                    ></path>
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 15a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"
                    ></path>
                </svg>
            </div>
        </div>

        <!-- Password Confirmation Field -->
        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-primary hover:bg-primary-700 text-white font-bold py-2 px-4 rounded">
                Register
            </button>
        </div>

        <!-- Add Link or Button to Navigate to Login Page -->
        <div class="mt-4 text-center">
            <!-- Option 1: Text Link -->
            <p>Already have an account? <a href="{{ route('login') }}" class="text-primary hover:text-primary-700 font-bold">Log in here</a>.</p>

        </div>
    </form>

    <!-- JavaScript for Show Password Toggle -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('password-toggle-icon');
            const visibleIcon = document.getElementById('password-visible-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.style.display = 'none';
                visibleIcon.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                toggleIcon.style.display = 'block';
                visibleIcon.style.display = 'none';
            }
        }
    </script>
</x-guest-layout>
