<?php

namespace App\Http\Controllers;

use App\Models\Avenue;
use App\Models\Project;
use DOMDocument;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avenues = Avenue::all(); // Assuming you have an Avenue model to fetch the avenues
        return view('projects.create', compact('avenues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'coverimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avenue_id' => 'required|array',
            'avenue_id.*' => 'exists:avenues,id',
        ]);

        $formFields['description'] = $request->description;
        $dom = new DOMDocument();
        $dom -> loadHtml($formFields['description'], 9);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img){
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/prject/" . time(). $key . '.png'; 
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);

           }
           $formFields['description'] = $dom->saveHTML();


        if ($request->hasFile('coverimage')) {
            $formFields['coverimage'] = $request->file('coverimage')->store('uploads', 'public');
        }

        $formFields['avenue_id'] = $request->avenue_id;

        $project = Project::create($formFields);
        $project->avenues()->sync($request->avenue_id);

        return redirect()->route('projects.index')->with('message', 'Project Created Successfully!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
