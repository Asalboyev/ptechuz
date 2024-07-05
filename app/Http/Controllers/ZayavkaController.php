<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zayavka;

/**
 * @OA\PathItem(path="/api/zayavkas")
 */
class ZayavkaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/zayavkas/",
     *     summary="Get list of reviews",
     *     @OA\Response(
     *         response=200,
     *         description="A list of reviews"
     *     )
     * )
     */
    public function index()
    {
        $teams = Zayavka::all();
        return response()->json($teams);
    }
    /**
     * @OA\Post(
     *      path="/api/zayavkas",
     *      summary="Create a new zayavka",
     *      tags={"Zayavka"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Zayavka")
     *      ),
     *      @OA\Response(response="201", description="Created"),
     *  )
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            // 'phone_number' => 'required|string|regex:/^\+?[0-9\s\-\(\)]+$/|max:20',
            // 'email' => 'required|string|max:255',
            // 'company' => 'required|string|max:255',
            // 'descriptions' => 'required|string|max:255',
        ]);

        $zayavka = Zayavka::create($request->all());
        return response()->json($zayavka, 201);
    }

    public function show($id)
    {
        return Zayavka::find($id);
    }

    public function update(Request $request, $id)
    {
        $zayavka = Zayavka::findOrFail($id);
        $zayavka->update($request->all());

        return $zayavka;
    }

    public function destroy($id)
    {
        Zayavka::destroy($id);

        return response()->noContent();
    }


//    public function show($id)
//    {
//        $team = Zayavka::find($id);
//
//        if (is_null($team)) {
//            return response()->json(['message' => 'Review not found'], 404);
//        }
//
//        return response()->json($team);
//    }


}
