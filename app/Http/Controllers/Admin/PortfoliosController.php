<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use App\Models\Lang;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Lang::all();
        $portfolios = Portfolio::query()->paginate(10);
        $categories = PortfolioCategory::query()->get();

        return view('admin.portfolios.index',compact('languages','portfolios','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Lang::all();
//        $categories = Category::with('subPosts.category')->where('category_id', null)->orderBy('id')->get();
        $categories = PortfolioCategory::query()->get();

//        $categories = Category::where('category_id', '!=', null)->get();
        return view('admin.portfolios.create',compact('languages','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('photo')) {
            $path = $request->file('photo')->store('upload/portfolio-images', 'public');
            $data['photo'] = $path;
        }
        Portfolio::create($data);
        return redirect()->route('admin.portfolios.index')->with(['message' => 'Successfully added!']);

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = PortfolioCategory::query()->get();
        $languages = Lang::all();
        return view('admin.portfolios.edit',compact('categories','portfolio','languages'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id )
    {
        $request->validate([
            'title.en' => 'required'
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Eski rasmni o'chirish
            if ($portfolio->photo) {
                Storage::disk('public')->delete($portfolio->photo);
            }

            // Yangi rasmni saqlash
            $path = $request->file('photo')->store('upload/portfolio-images', 'public');
            $data['photo'] = $path;
        }

        $portfolio->update($data);
        return redirect()->route('admin.portfolios.index')->with(['message' => 'Successfully updated!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // Rasmlar mavjud bo'lsa, ularni o'chirish
        if ($portfolio->photo) {
            Storage::disk('public')->delete($portfolio->photo);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with(['message' => 'Successfully deleted!']);
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->getClientOriginalName();
            $request->file('upload')->move(public_path('site/images/services/'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('site/images/portfolio/' . $fileName); // URL uchun asset funksiyasidan foydalanamiz
            $msg = 'Image successfully uploaded';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
    public function search(Request $request) {
        $search_term = mb_strtolower($request->search);

        // Search in Category models
        $categories = Portfolio::where('title', 'like', '%' . $search_term . '%')
            ->orWhere('status', 'like', '%' . $search_term . '%')->get();

        // Merge all results
        $portfolios = collect()
            ->merge($categories);

        $search_word = $request->search;

        return view('admin.portfolios.search', compact('portfolios', 'search_word'));
    }
    public function status(Request $request) {
        $status = $request->input('status'); // select tanlov qiymati
        $query = Portfolio::query();

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        $portfolios = $query->paginate(10);

        return view('admin.portfolios.status', compact('portfolios', ));
    }

}
