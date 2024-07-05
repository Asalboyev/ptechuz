<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servic;

/**
 * @OA\PathItem(path="/api/services")
 */
class ServicController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/services/",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     *     )
     * )
     */
    public function index()
    {
        $services = Servic::all();
        return response()->json($services);
    }

/**
 * @OA\Get(
 *     path="/api/service/category",
 *     summary="Get products by category",
 *     @OA\Parameter(
 *         name="category_id",
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
    $category = request()->query('service_category_id');

    if (is_null($category)) {
        return response()->json(['message' => 'Category is required'], 400);
    }

    $products = Servic::where('service_category_id', $category)->get();

    if ($products->isEmpty()) {
        return response()->json(['message' => 'No post found in this category'], 404);
    }

    return response()->json($products);
}


    /**
     * @OA\Get(
     *     path="/api/services{id]",
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
        $service = Servic::find($id);

        if (is_null($service)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($service);
    }
}
