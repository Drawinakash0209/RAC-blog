<?php

namespace App\Http\Controllers;

use App\Models\Avenue;
use App\Models\Director;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        return view('director.index', [
            'directors' => Director::orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function directors()
    {
        return view('director.directors', [
            'directors' => Director::orderBy('sort_order')->orderBy('id')->get(),
            'heroImage' => SiteContent::getValue('directors_hero_image'),
        ]);
    }




    public function create()
    {
        $avenues = Avenue::all(); 
        return view('director.create', compact('avenues'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'about' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'linkedin' => 'required',
            'avenue_id' => 'required',
            'sort_order' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('director', 'public');
        }

        Director::create($formFields);

        return redirect()->route('directors.index');
    }

    public function edit(Director $director)
    {
        $avenues = Avenue::all();
        return view('director.edit', compact('director', 'avenues'));
    }

    public function show(Director $director)
{
    return view('director.show', compact('director'));
}

    public function update(Request $request, Director $director)
    {
        $formFields= $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'about' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'linkedin' => 'required',
            'avenue_id' => 'required',
            'sort_order' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('director', 'public');
        }

        $director->update($formFields);

        return redirect()->route('directors.index')->with('message', 'Director Updated Successfully!');
    }


    public function destroy(Director $director)
    {
        $director->delete();
        return redirect()->route('directors.index')->with('message', 'Director Deleted Successfully!');
    }
}
