<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sertificate;

/**
 * @OA\PathItem(path="/api/sertificate")
 */
class SertificateController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/sertificate/",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     *     )
     * )
     */
    public function index()
    {
        $sertificates = Sertificate::all();
        return response()->json($sertificates);
    }

    /**
     * @OA\Get(
     *     path="/api/sertificate{id}",
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
        $sertificate = Sertificate::find($id);

        if (is_null($sertificate)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($sertificate);
    }
}
