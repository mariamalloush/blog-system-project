<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .burger-menu {
            display: none;
        }

        @media (max-width: 640px) {
            .burger-menu {
                display: flex;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                background: white;
                position: absolute;
                top: 60px;
                left: 0;
                border-top: 1px solid #e2e8f0;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links a, .nav-links form button {
                display: block;
                padding: 12px 20px;
                border-bottom: 1px solid #e2e8f0;
                background-color: unset;
                color: rgb(160, 160, 160);
                font-weight: 500;
                transition: color 0.3s;
                width: 100%;
                text-align: left;
                font-size: 16px;
            }

            .nav-links a:hover, .nav-links form button:hover, .nav-links a.create-post-btn:hover {
                color: black;
            }

            /* Hide the username dropdown trigger on mobile */
            .nav-links .user-dropdown {
                display: none;
            }

            /* Make the dropdown content always visible on mobile */
            .nav-links .dropdown-content {
                position: static;
                display: block;
                box-shadow: none;
                background: none;
                padding: 0;
            }

            /* Style the Create Post button to match other links */
            .nav-links a.create-post-btn {
                background: none;
                color: rgb(160, 160, 160);
                border-radius: 0;
                margin: 0;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-light text-gray-900">
    <div class="min-h-screen">
        <nav class="bg-white border-b border-gray-100 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ url('/') }}" class="text-2xl font-bold text-primary">Blog System</a>
                        </div>
                    </div>

                    <div class="burger-menu sm:hidden">
                        <button onclick="toggleNav()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="nav-links sm:flex sm:items-center sm:ml-6">
                        @auth
                            <!-- Desktop view remains unchanged -->
                            <div class="hidden sm:flex sm:items-center">
                                <a href="{{ route('posts.create') }}" class="bg-primary hover:bg-primary-700 text-white font-bold py-2 px-4 rounded mr-4">
                                    Create Post
                                </a>
                                <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700 mr-4">Posts</a>
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="user-dropdown inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.show')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>

                            <!-- Mobile view with simplified linear menu -->
                            <div class="sm:hidden">
                                <a href="{{ route('posts.create') }}" class="create-post-btn">Create Post</a>
                                <a href="{{ route('posts.index') }}">Posts</a>
                                <a href="{{ route('profile.show') }}">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Log Out</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-12">
            <div class="container mx-auto px-4">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        function toggleNav() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>
