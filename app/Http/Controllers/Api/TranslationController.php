<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Http\Resources\TranslationResource;


class TranslationController extends Controller
{
   
    public function index()
    {
        $translations = Translation::all();
        $formattedTranslations = $translations->mapWithKeys(function ($translation) {
            return [$translation->key => $translation->val['en'] ?? $translation->val['ru'] ?? $translation->val['uz'] ?? null];
        });

        return response()->json($formattedTranslations);
    }

    
    public function show($id)
    {
        $translation = Translation::find($id);

        if (is_null($translation)) {
            return response()->json(['message' => 'Translation not found'], 404);
        }

        return new TranslationResource($translation);
    }
}
