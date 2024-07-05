<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Translation;
use App\Models\Lang;
use App\Models\Group;

class TranslationsController extends Controller
{
    public function index() {
        $translations = Translation::orderBy('id', 'desc')->paginate(10);
        $languages = Lang::all();
        $groups = Group::all();

        return view('admin.translations.index', [
            'translations' => $translations,
            'languages' => $languages,
            'groups' =>$groups,
        ]);
    }


    public function create($id) {

        $group = Group::findOrFail($id);
        $languages = Lang::all();
        // $translation = Translation::all();
        $translation = Translation::where('group_id', $group->id)->get();

        return view('admin.translations.edit', [
            'translation' => $translation,
            'languages' => $languages,
            'group' => $group,
        ]);
    }

    public function update(Request $request, $groupId)
    {
        //dd($request->all());
        $group = Group::find($groupId);
        $keys = $request->input('key');
        $translationIds = $request->input('group_id');
        $values = $request->input('val');
        if(gettype($translationIds) == 'object' || gettype($translationIds) == 'array'){
          foreach ($translationIds as $index => $vall) {
            if (!empty($translationIds[$index])) {
                // Update existing translation
                $translation = Translation::find($translationIds[$index]);
                $translation->key = $keys[$index];
            } else {
                // Create new translation
                $translation = new Translation();
                $translation->group_id = $groupId;
                $translation->key = $keys[$index];
            }
            $translation->val = $values[$index];
            $translation->save();
        }
     }
         return redirect()->route('admin.group.show', $request->id)->with(['message' => 'Translations updated successfully.']);
}



    public function edit() {
        $languages = Lang::all();
        return view('admin.translations.create',compact('languages'));
    }

    public function tr_update(Request $request, $id) {
        // dd($request->all());
        $request->validate([
            'key' => 'required|max:255',
            'val' => 'required|max:255',
          ]);

          $translation = Translation::find($id);

          $translation->key = $request->key;
          $translation->val = $request->val;

          $translation->save();

          return redirect()->back()->with(['message' => 'Successfully added!']);
        }

    public function destroy($id) {


        Translation::find($id)->delete();
        return back()->with(['message' => 'Successfully deleted!']);
    }



    // public function search(Request $request) {
    //     $languages = Lang::all();
    //     $translations = Translation::all();
    //     $groups = Group::all();
    //     $cc = mb_strtolower($request->search);

    //     foreach ($translations as $item) {
    //         $val = $item->val;
    //         $val['uz'] = mb_strtolower($item->val['ru']);
    //         $item->val = $val;
    //     }

    //     $result = collect($translations)->filter(function ($item) use ($cc) {
    //         return false !== stripos($item->val['uz'], $cc);
    //     });

    //     foreach ($languages as $lang) {
    //         $value = 'val->' . $lang->small;
    //         if ($lang->small != 'uz') {
    //             $additionalResults = Translation::where($value, 'like', '%' . $request->search . '%')
    //                 ->orWhere('key', 'like', '%' . $request->search . '%')
    //                 ->get();
    //             $result = $result->merge($additionalResults);
    //         }
    //     }

    //     // Group filtering by name
    //     $groupResults = Group::where('name', 'like', '%' . $request->search . '%')->get();
    //     $result = $result->merge($groupResults);

    //     $search_word = $request->search;

    //     return view('admin.translations.search', compact([
    //         'result',
    //         'search_word',
    //         'languages',
    //         'groups'
    //     ]));
    // }



    public function search(Request $request) {

        $languages = Lang::all();
        $a = Translation::all();
        $groups = Group::all();
        $cc = mb_strtolower($request->search);
        foreach ($a as $item) {
            $c['uz'] = mb_strtolower($item->val['uz']);
            $item->val = $c;
        }
        $result = collect($a)->filter(function ($item) use ($cc) {
            return false !== stripos($item->val['uz'], $cc);
        });
        foreach ($languages as $lang) {
            $value = 'val->'.$lang->small;
            if ($lang->small != 'uz') $result = $result->merge(Translation::where($value, 'like', '%'.$request->search.'%')->orWhere('key', 'like', '%'.$request->search.'%')->get());
        }

        $search_word = $request->search;

        return view('admin.translations.search', compact([
            'result',
            'search_word',
            'languages',
            'groups'
        ]));
    }

    public function group_store(Request $request)
    {
        $group = Group::create($request->all());
        return redirect()->route('admin.translations.index');
    }
      public function group_show($id) {
        $group = Group::findOrFail($id);
        $groups = Group::all();
        $languages = Lang::all();
        $translations = Translation::where('group_id', $group->id)->paginate(10);

        $currentRoute = \Route::current(); // Joriy ro'yxat ma'lumoti

        return view('admin.translations.show', [
            'translations' => $translations,
            'languages' => $languages,
            'group' => $group,
            'groups' => $groups,
            'id' => $id

        ]);
    }
}
