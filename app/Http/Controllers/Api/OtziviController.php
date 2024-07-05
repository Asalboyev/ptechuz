<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Otzivi;
use Illuminate\Http\Request;

/**
 * @OA\PathItem(path="/api/otzivis")
 */
class OtziviController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/otzivis",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     *     )
     * )
     */
    public function index()
    {
        $otzivis = Otzivi::all();
        return response()->json($otzivis);
    }

    /**
     * @OA\Get(
     *     path="/api/otzivis/{id}",
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
        $otzivi = Otzivi::find($id);

        if (is_null($otzivi)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($otzivi);
    }
}
