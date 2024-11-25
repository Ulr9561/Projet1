<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;


/**
 * @group Gestion des articles
 */
class ArticleController extends Controller
{
    /**
     * Recuperer la liste de tout les articles.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // $articles = Article::with('category')->get();
        $articles = ArticleResource::collection(Article::with('category')->get());
        return self::apiResponse(true, "", $articles);
    }

    /**
     * Créer un nouvel article.
     *
     * @bodyParam name string required.
     *
     * @bodyParam price numeric required.
     *
     * @bodyParam category string required.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:1',
                'category' => 'required|string|exists:categories,name',
            ]);

            if (Article::where('name', '=', $request->name)->first()) {
                return self::apiResponse(false, "L'article existe déjà", status: 205);
            }
            $category = Category::where('name', '=', $request->category)->firstOrFail();
            $article = Article::create([
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $category->id,
            ]);

            return self::apiResponse(true, "Article crée avec succès", ['article' => ArticleResource::collection($article)], 201);
        } catch (\Exception $e) {
            return self::apiResponse(false, "Une erreur est survenue", ['error' => $e->getMessage()], 500);
        }

    }

    /**
     * Afficher un article.
     * @param string id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $article = Article::with('category')->find($id);
        return self::apiResponse(true, "", ArticleResource::collection($article));
    }

    /**
     * Update the specified resource in storage.
     *
     * @bodyParam name string nullable.
     *
     * @bodyParam price numeric nullable.
     *
     * @bodyParam category string nullable.
     */
    public function update(Request $request, string $id)
    {
        try {
            if ($request->isNotFilled(['name', 'price', 'category'])) {
                return self::apiResponse(false, "Aucune donnée fournie pour la mise à jour", status: 200);
            }

            $request->validate([
                'name' => 'nullable|string|max:255',
                'price' => 'nullable|numeric|min:1',
                'category' => 'nullable|string|exists:categories,name',
            ]);

            $article = Article::with('category')->find($id);
            if (!$article) {
                return self::apiResponse(false, "Article introuvable", status: 404);
            }

            $data = $request->only(['name', 'price', 'category']);
            if (isset($data['category'])) {
                $category = Category::where('name', '=', $data['category'])->first();
                if ($category) {
                    $data['category_id'] = $category->id;
                    unset($data, $data['category']);
                }
            }
            $article->update($data);
            return self::apiResponse(true, "Article mis a jour avec succès");

        } catch (\Exception $e) {
            return self::apiResponse(false, "Une error est survenue", status: 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::with('category')->find($id);
        $article->delete();

        return self::apiResponse(true, "Article supprimé avec succès");
    }

    public static function apiResponse($success, $message, $data = [], $status = 200)
    {
        $response = response()->json([
            'success' => $success,
            'message' => $message,
            'body' => $data
        ], $status);

        return $response;
    }
}
