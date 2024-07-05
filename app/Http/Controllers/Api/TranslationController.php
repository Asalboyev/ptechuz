<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use Illuminate\Http\Request;

/**
 * @OA\PathItem(path="/api/translations")
 */
class TranslationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/translations/",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     *     )
     * )
     */
    public function index()
    {
        $teams = Translation::all();
        return response()->json($teams);
    }

    /**
     * @OA\Get(
     *     path="/api/translations{id]",
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
        $team = Translation::find($id);

        if (is_null($team)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($team);
    }
}
