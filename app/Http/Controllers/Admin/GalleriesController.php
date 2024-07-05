<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Lang::all();
        $galleries = Gallery::query()->paginate(10);

        return view('admin.galleries.index',compact('languages','galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$data = $request->all();
        //
        //if ($request->hasFile('photo')) {
        //    $path = $request->file('photo')->store('upload/post-images', 'public');
        //    $data['photo'] = $path;
        //}
        //
        //if ($request->hasFile('video')) {
        //    $videoPath = $request->file('video')->store('upload/post-videos', 'public');
        //    $data['video'] = $videoPath;
        //}
        //
        //Post::create($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('upload/gallery-images', 'public');
            $data['photo'] = $path;
        }

        if ($request->hasFile('videos')) {
            $videoPath = $request->file('videos')->store('upload/gallery-videos', 'public');
            $data['videos'] = $videoPath;
        }

        Gallery::create($data);
        return redirect()->route('admin.banners.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title.en' => 'required'
        ]);

        $gallery = Gallery::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Eski rasmni o'chirish
            if ($gallery->photo) {
                Storage::disk('public')->delete($gallery->photo);
            }

            $path = $request->file('photo')->store('upload/gallery-images', 'public');
            $data['photo'] = $path;
        }

        if ($request->hasFile('videos')) {
            // Eski videoni o'chirish
            if ($gallery->video) {
                Storage::disk('public')->delete($gallery->video);
            }

            $videoPath = $request->file('videos')->store('upload/gallery-videos', 'public');
            $data['videos'] = $videoPath;
        }

        $gallery->update($data);

        return redirect()->route('admin.banners.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Rasmlar mavjud bo'lsa, ularni o'chirish
        if ($gallery->photo) {
            Storage::disk('public')->delete($gallery->photo);
        }

        // Videolar mavjud bo'lsa, ularni o'chirish
        if ($gallery->video) {
            Storage::disk('public')->delete($gallery->video);
        }

        $gallery->delete();

        return redirect()->route('admin.banners.index')->with(['message' => 'Successfully deleted!']);
    }
}
