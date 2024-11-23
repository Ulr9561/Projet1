<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category')->get();
        return self::apiResponse(true, "", $articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'category' => 'required|string|exists:categories,name',
        ]);

        if (Article::where('name', '=', $request->name)->first()) {
            return self::apiResponse(false, "La catégorie existe déjà", status: 204);
        }

        $category = Category::where('');
        $article = Article::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return self::apiResponse(true, "Catégorie crée avec succès", ['articles' => $article], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with('category')->find($id);
        return self::apiResponse(true, "", $article);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::with('category')->find($id);
        $article->update(
            [
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category_id,
            ]
        );

        return self::apiResponse(true, "Article mis a jour avec succès");
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
