<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

/**
 * @OA\PathItem(path="/api/products")
 */
class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products/",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     * )
     * )
     */
    public function index()
    {
        $products = Product::all();
        if (is_null($products)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($products);
    }


/**
 * @OA\Get(
 *     path="/api/product/category",
 *     summary="Get products by category",
 *     @OA\Parameter(
 *         name="product_category_id",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="A list of products"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Category not found"
 *     )
 * )
 */
public function filter()
{
    $category = request()->query('product_category_id');

    if (is_null($category)) {
        return response()->json(['message' => 'Category is required'], 400);
    }

    $products = Product::where('product_category_id', $category)->get();

    if ($products->isEmpty()) {
        return response()->json(['message' => 'No products found in this category'], 404);
    }

    return response()->json($products);
}



    /**
     * @OA\Get(
     *     path="/api/products/{id}",
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
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($product);
    }
}
