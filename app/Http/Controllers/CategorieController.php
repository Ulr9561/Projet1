<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

/**
 * @group Categories
 */
class CategorieController extends Controller
{
    /**
     * Liste des categories
     * @authenticated
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
