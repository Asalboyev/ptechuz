<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Servic;
use Illuminate\Http\Request;
use App\Models\Lang;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Lang::all();
        $partnerts = Partner::query()->paginate(10);

        return view('admin.partners.index',compact('languages','partnerts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Lang::all();
        return view('admin.partners.create',compact('languages',));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title.uz' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('photo')) {
            $path = $request->file('photo')->store('upload/partner-images', 'public');
            $data['photo'] = $path;
        }
        Partner::create($data);
        return redirect()->route('admin.partners.index')->with(['message' => 'Successfully added!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        $languages = Lang::all();
        return view('admin.partners.edit',compact('partner','languages'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id )
    {
        $request->validate([
            'title.uz' => 'required'
        ]);

        $partner = Partner::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Eski rasmni o'chirish
            if ($partner->photo) {
                Storage::disk('public')->delete($partner->photo);
            }

            // Yangi rasmni saqlash
            $path = $request->file('photo')->store('upload/servic-images', 'public');
            $data['photo'] = $path;
        }

        $partner->update($data);
        return redirect()->route('admin.partners.index')->with(['message' => 'Successfully updated!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        // Rasmlar mavjud bo'lsa, ularni o'chirish
        if ($partner->photo) {
            Storage::disk('public')->delete($partner->photo);
        }

        $partner->delete();

        return redirect()->route('admin.services.index')->with(['message' => 'Successfully deleted!']);
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->getClientOriginalName();
            $request->file('upload')->move(public_path('site/images/product/'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('site/images/product/' . $fileName); // URL uchun asset funksiyasidan foydalanamiz
            $msg = 'Image successfully uploaded';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
    public function search(Request $request) {
        $search_term = mb_strtolower($request->search);

        // Search in Category models
        $partnerts = Partner::where('title', 'like', '%' . $search_term . '%')
            ->orWhere('link', 'like', '%' . $search_term . '%')->get();

        // Merge all results
        $partnerts = collect()
            ->merge($partnerts);

        $search_word = $request->search;

        return view('admin.partners.search', compact('partnerts', 'search_word'));
    }
}
