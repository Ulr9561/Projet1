<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @group Gestion des catégories
 */
class CategorieController extends Controller
{
    /**
     * Liste des categories
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = CategoryResource::collection(Category::all());

        return self::apiResponse(true, "", $Categories);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $category = Category::firstOrCreate([
                'name' => $request->name,
            ]);
            return self::apiResponse(true, "Categorie crée avec succès", $category, 201);
        } catch (\Exception $e) {
            return self::apiResponse(false, "Une erreur est survenue", ['error' => $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $category = Category::find($id);
        return self::apiResponse(true, "", $category, 200);
    }

    public function update(Request $request, string $id)
    {
        try {
            if ($request->isNotFilled(['name'])) {
                return self::apiResponse(false, "Aucune donnée fournie pour la mise à jour", status: 200);
            }

            $request->validate([
                'name' => 'nullable|string|max:255',
            ]);
            $category = Category::find($id);
            if(!$category) {
                return self::apiResponse(false, "La categorie n'existe pas");
            }

            $category->update([
                'name' => $request->name
            ]);

            return self::apiResponse(true, "Categorie mise a jour avec succès", ['category' => $category]);
        } catch (\Exception $e) {
            return self::apiResponse(false, "Une error est survenue", ['error' => $e->getMessage()], status: 500);
        }
    }

    public function destroy(string $id) {
        $category = Category::find($id);
        $category->delete();

        return self::apiResponse(true, "Categorie supprimée avec succès");
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
