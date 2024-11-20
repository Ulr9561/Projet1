@extends('layouts.auth')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
        <h1 class="text-center text-2xl font-extrabold text-blue-600 p-4">Register Form</h1>
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        <form class="space-y-6" action="{{ route('user.register') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div>
                <label for="name" id="name"
                    class="block text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                <input type="text" name="name" id="name"
                    class="block w-full p-3 border rounded-lg shadow-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200"
                    placeholder="Enter your full name" required />
            </div>
            <div>
                <label for="email" class="block text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                <input type="email" name="email" id="email"
                    class="block w-full p-3 border rounded-lg shadow-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200"
                    placeholder="Enter your email" required />
            </div>
            <div>
                <label for="password"
                    class="block text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                <input type="password" name="password" id="password"
                    class="block w-full p-3 border rounded-lg shadow-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200"
                    placeholder="Enter your password" required />
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    Register
                </button>
            </div>
        </form>
        <div class="flex space-x-2 mt-2 justify-center">
            <span class="dark:text-gray-200">Already have an account ?</span>
            <a href="{{ route('login') }}" class="dark:text-blue-400 hover:underline">Login here</a>
        </div>
    </div>
@endsection
