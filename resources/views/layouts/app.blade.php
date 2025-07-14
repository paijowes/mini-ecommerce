<!DOCTYPE html>
<html lang="en" x-data="themeSwitcher" x-init="init()" :class="{ 'dark': isDark }">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Mini E-Commerce') }}</title>

    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none; }
        html { transition: background-color 0.3s ease, color 0.3s ease; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Kiri -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800 dark:text-white">
                    {{ config('app.name', 'Mini E-Commerce') }}
                </a>
            </div>

            <!-- Kanan -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Dashboard</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Products</a>
                <a href="{{ route('cart.index') }}" class="relative text-gray-700 dark:text-gray-300 hover:underline">
                    Cart
                    @php $cartCount = session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0; @endphp
                    @if ($cartCount > 0)
                        <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="hover:underline text-gray-700 dark:text-gray-300">
                            {{ auth()->user()->name }}
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-700 rounded-md shadow-lg z-10">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">Profile</a>
                            <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">Orders</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>


    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 text-center py-4 text-sm text-gray-500 dark:text-gray-300 shadow-inner">
        &copy; {{ date('Y') }} {{ config('app.name', 'Mini E-Commerce') }}. All rights reserved.
    </footer>

    <!-- Floating Toggle Dark Mode Button -->
    <div class="fixed bottom-4 right-4 z-50">
        <button
            @click="toggleTheme"
            class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-xl p-3 rounded-full shadow-lg transition"
            title="Toggle Dark Mode"
            x-text="isDark ? '☀️' : '🌙'"
        ></button>
    </div>

    <!-- Alpine theme switcher script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('themeSwitcher', () => ({
                isDark: false,
                init() {
                    this.isDark = localStorage.theme === 'dark' ||
                        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
                    this.applyTheme();
                },
                toggleTheme() {
                    this.isDark = !this.isDark;
                    localStorage.theme = this.isDark ? 'dark' : 'light';
                    this.applyTheme();
                },
                applyTheme() {
                    document.documentElement.classList.toggle('dark', this.isDark);
                }
            }));
        });
    </script>

</body>
</html>
