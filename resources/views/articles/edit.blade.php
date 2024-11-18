@extends('layouts.app')

@section('name', 'Modifier un article')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Modifier un article</h3>
        <form action="{{ route('article.update', $article->id) }}" method="post" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="min-h-16">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom de
                    l'article</label>
                <input type="text" id="name" name="name" value="{{ $article->name }}"
                    class="mt-1 block w-full rounded-md h-full min-h-12 p-4 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                    placeholder="Entrez le nom de l'article" required>
            </div>

            <div class="min-h-16">
                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prix de
                    l'article</label>
                <input type="number" min="1" id="price" name="price" value="{{ $article->price }}"
                    class="mt-1 block w-full rounded-md h-full min-h-12 p-4 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                    placeholder="Entrez le prix de l'article" required>
            </div>

            <div class="min-h-16">
                <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Catégorie de l'article
                </label>
                <select id="category_id" name="category_id"
                    class="mt-1 block w-full rounded-md h-full min-h-12 p-4 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                    required>
                    <option value="" disabled selected class="disabled:bg-slate-800">-- Sélectionnez une catégorie --
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $article->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
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
