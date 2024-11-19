@extends('layouts.app')


@section('name', 'Liste des articles')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Articles</h1>
        <button class="flex items-center space-x-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            <a class="no-underline flex" href="{{ route('article.create') }}">
                <svg class="w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Ajouter un article</span>
            </a>
        </button>

    </div>

    <form class="flex min-w-36 w-full align-content-end items-center justify-end gap-2" >
        <div class="relative w-full max-w-xs">
            <button type="submit" id="search_button" class="absolute inset-y-0 w-9 h-9 left-0 flex items-center justify-center pointer-events-none text-gray-400 ">
                <svg xmlns="http://www.w3.org/2000/svg" class=" fill-white flex items-center p-1" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
                    <path
                        d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z">
                    </path>
                </svg>
            </button>
            <label for="search" class="sr-only">Rechercher</label>
            <input type="text" id="search" name="search"
                class="w-full p-3 pl-9 text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Rechercher une categorie"
            />
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white dark:bg-gray-800 rounded-lg shadow-md">

            <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">
                        ID
                        <span onclick="sortTable('id')" class="inline-block cursor-pointer text-xs">
                            &#9650;&#9660;
                        </span>
                    </th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">
                        Nom
                        <span onclick="sortTable('name')" class="inline-block cursor-pointer text-xs">
                            &#9650;&#9660;
                        </span>
                    </th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">
                        Prix
                        <span onclick="sortTable('price')" class="inline-block cursor-pointer text-xs">
                            &#9650;&#9660;
                        </span>
                    </th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">
                        Catégorie
                        <span onclick="sortTable('category_id')" class="inline-block cursor-pointer text-xs">
                            &#9650;&#9660;
                        </span>
                    </th>
                    <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="border-t border-gray-300 dark:border-gray-700">
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">{{ $article->id }}</td>
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
        <div class="flex gap-2 mt-8 items-center space-x-2 justify-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
