<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/**
 * @OA\PathItem(path="/api/categories")
 */
class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Get list of categories",
     *     @OA\Response(
     *         response=200,
     *         description="A list of categories"
     *     )
     * )
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     summary="Get a category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="A category"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found"
     *     )
     * )
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }
}
