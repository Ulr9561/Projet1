<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

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
        $Categories = Category::all();

        return self::apiResponse(true, "", $Categories);
    }

    public function create()
    {
        return self::apiResponse(true, "");
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
