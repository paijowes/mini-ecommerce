<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
            <div class="flex justify-center mb-6">
                <x-application-logo class="w-16 h-16 text-gray-500" />
            </div>
            <h2 class="text-2xl font-bold text-center mb-4">{{ __('Log in') }}</h2>
            <x-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" required autofocus
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>
                <div>
                    <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
                </div>
                <div class="flex items-center justify-between">
                    <a href="{{ route('register') }}" class="text-sm text-indigo-600 hover:underline">
                        {{ __('Register') }}
                    </a>
                    <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-indigo-500">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
