<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;

/**
 * @OA\PathItem(path="/api/service-categories")
 */
class ServiceCategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/service-categories/",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     *     )
     * )
     */
    public function index()
    {
        $services = ServiceCategory::all();
        return response()->json($services);
    }

    /**
     * @OA\Get(
     *     path="/api/service-categories{id]",
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
        $service = ServiceCategory::find($id);

        if (is_null($service)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($service);
    }
}
