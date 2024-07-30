<?php

namespace App\Http\Controllers;

use App\Models\Avenue;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        return view('director.index', [
            'directors' => Director::all(),
        ]);
    }

    public function directors()
    {
        return view('director.directors', [
            'directors' => Director::all(),
        ]);
    }




    public function create()
    {
        $avenues = Avenue::all(); 
        return view('director.create', compact('avenues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'about' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'linkedin' => 'required',
            'avenue_id' => 'required',
        ]);

        Director::create($request->all());

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
        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'linkedin' => 'required',
            'avenue_id' => 'required',
        ]);

        $director->update($request->all());

        return redirect()->route('directors.index')->with('message', 'Director Updated Successfully!');
    }
}
