<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

/**
 * @OA\PathItem(path="/api/product-categories")
 */
class ProductCategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/product-categories/",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     *     )
     * )
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        return response()->json($productCategories);
    }

    /**
     * @OA\Get(
     *     path="/api/product-categories/{id}",
     *     summary="Get a review by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="A review"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Review not found"
     *     )
     * )
     */
    public function show($id)
    {
        $productCategory = ProductCategory::find($id);

        if (is_null($productCategory)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($productCategory);
    }
}
