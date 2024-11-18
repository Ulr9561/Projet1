@extends('layouts.app')


@section('name', 'Liste des articles')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Articles</h1>
        <button class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            <a class="no-underline flex" href="{{ route('article.create')}}">
                <svg class="w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Ajouter un article</span>
            </a>

        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Nom</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Prix</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Catégorie</th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="border-t border-gray-300 dark:border-gray-700">
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">{{ $article->name }}</td>
                        <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $article->price }} FCFA</td>
                        <td class="px-4 py-2 text-gray-600 dark:text-gray-400">
                            @if ($article->category)
                                {{ $article->category->name }}
                            @else
                                Pas de catégorie
                            @endif
                        </td>
                        <td class="px-4 py-2 text-gray-600 dark:text-gray-400 flex space-x-2">
                            <a href="{{ route('article.edit', $article->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-4 h-4 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L10 17H7v-3L18.5 2.5z" />
                                </svg>
                                Edit
                            </a>

                            <form action="{{ route('article.destroy', $article->id) }}" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-4 h-4 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
