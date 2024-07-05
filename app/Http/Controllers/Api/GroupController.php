<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Group;
use Illuminate\Http\Request;

/**
 * @OA\PathItem(path="/api/groups")
 */
class GroupController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/groups",
     *     summary="Get list of groups",
     *     @OA\Response(
     *         response=200,
     *         description="A list of groups"
     *     )
     * )
     */
    public function index()
    {
        $groups = Group::all();
        return response()->json($groups);
    }

    /**
     * @OA\Get(
     *     path="/api/groups/{id}",
     *     summary="Get a group by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="A group"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Group not found"
     *     )
     * )
     */
    public function show($id)
    {
        $group = Group::find($id);

        if (is_null($group)) {
            return response()->json(['message' => 'Group not found'], 404);
        }

        return response()->json($group);
    }
}
