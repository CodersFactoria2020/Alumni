<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;
use App\Http\Resources\Language as LanguageResource;

class LanguageController extends Controller
{
    
    public function index()
    {
        $languages = Language::all();
        return view('language.index',['languages'=>$languages]);
    }

    public function create()
    {
        return view('language.create');
    }

    public function store(Request $request)
    {
        Language::create($request->all());
        return redirect('/language');
    }

    public function show(Language $language)
    {
        return view ('language.show', compact ('language'));
    }

    public function edit(Language $language)
    {
        return view('language.edit', compact('language'));

    }

    public function update(Request $request, Language $language)
    {
        $language->update($request->all());
        return redirect(route('language.index'));
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return redirect(route('language.index'));
    }

    public function all()
    {
        return LanguageResource::collection(Language::all());
    }
}
