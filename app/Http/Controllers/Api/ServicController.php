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
     *     path="/api/services/{id}",
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
        $productCategory = Servic::find($id);

        if (is_null($productCategory)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($productCategory);
    }
}
