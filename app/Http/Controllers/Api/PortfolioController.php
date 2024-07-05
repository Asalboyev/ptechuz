<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;


/**
 * @OA\PathItem(path="/api/portfolios")
 */
class PortfolioController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/portfolios/",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     *     )
     * )
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return response()->json($portfolios);
    }



/**
 * @OA\Get(
 *     path="/api/portfolio/category",
 *     summary="Get products by category",
 *     @OA\Parameter(
 *         name="portfolio_category_id",
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
    $category = request()->query('portfolio_category_id');

    if (is_null($category)) {
        return response()->json(['message' => 'Category is required'], 400);
    }

    $products = Portfolio::where('portfolio_category_id', $category)->get();

    if ($products->isEmpty()) {
        return response()->json(['message' => 'No portfolio found in this category'], 404);
    }

    return response()->json($products);
}



    /**
     * @OA\Get(
     *     path="/api/portfolios/{id}",
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
        $portfolio = Portfolio::find($id);

        if (is_null($portfolio)) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($portfolio);
    }
}
