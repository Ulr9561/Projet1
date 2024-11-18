@extends('layouts.app')

@section('name', 'Modifier une Catégorie')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Modifier une categorie</h3>
        <form action="{{ route('category.update', $category->id) }}" method="post" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="min-h-16">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom de la
                    Catégorie</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}"
                    class="mt-1 block w-full rounded-md h-full min-h-12 p-4 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                    placeholder="Entrez le nom de la catégorie" required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                    Modifier
                </button>
            </div>
        </form>

    </div>
@endsection
