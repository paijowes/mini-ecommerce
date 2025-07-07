<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name', 'My App') }}</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
  <nav class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-between items-center">
      <a href="{{ route('dashboard') }}" class="font-bold text-xl">{{ config('app.name', 'My App') }}</a>
      <div class="flex items-center space-x-6">
        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:underline">Dashboard</a>
        <a href="{{ route('products.index') }}" class="text-gray-600 hover:underline">Products</a>
        @auth
            <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:underline">{{ auth()->user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-gray-600 hover:underline">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-gray-600 hover:underline">Login</a>
            <a href="{{ route('register') }}" class="text-gray-600 hover:underline">Register</a>
        @endauth
      </div>
    </div>
  </nav>
  <main class="container mx-auto p-6">
    @yield('content')
  </main>
</body>
</html>
