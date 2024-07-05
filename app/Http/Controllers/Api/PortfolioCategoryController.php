<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

/**
 * @OA\PathItem(path="/api/portfolio-categories")
 */
class PortfolioCategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/portfolio-categories/",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     *     )
     * )
     */
    public function index()
    {
        $partners = PortfolioCategory::all();
        return response()->json($partners);
    }

    /**
     * @OA\Get(
     *     path="/api/portfolio-categories/{id}",
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
        $portfolioCategory = PortfolioCategory::find($id);

        if (is_null($portfolioCategory)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($portfolioCategory);
    }
}
