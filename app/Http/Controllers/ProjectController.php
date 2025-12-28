<?php

namespace App\Http\Controllers;

use App\Models\Avenue;
use App\Models\Project;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $avenues = Avenue::all();
        return view('projects.create', compact('avenues'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'coverimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'avenue_id' => 'required|array',
            'avenue_id.*' => 'exists:avenues,id',
        ]);

        $formFields['description'] = $request->description;
        $dom = new DOMDocument();
        $dom->loadHtml($formFields['description'], 9);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img){
            if (strpos($img->getAttribute('src'), 'data:image') !== false) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/projects/" . time(). $key . '.png'; // FIXED: was /prject/
                
                if (!file_exists(public_path() . '/projects')) {
                    mkdir(public_path() . '/projects', 0755, true);
                }
                
                file_put_contents(public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $formFields['description'] = $dom->saveHTML();

        if ($request->hasFile('coverimage')) {
            try {
                $filename = $request->file('coverimage')->store('uploads', 'public');
                
                if (!Storage::disk('public')->exists($filename)) {
                    return back()->withErrors(['coverimage' => 'Failed to save cover image.'])->withInput();
                }
                
                $formFields['coverimage'] = $filename;
            } catch (\Exception $e) {
                return back()->withErrors(['coverimage' => 'Error: ' . $e->getMessage()])->withInput();
            }
        }

        $formFields['avenue_id'] = $request->avenue_id;

        $project = Project::create($formFields);
        $project->avenues()->sync($request->avenue_id);

        return redirect()->route('projects.index')->with('message', 'Project Created Successfully!');
    }

    public function show($id)
    {
        $recentProjects = Project::where('id', '!=', $id)
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();

        $project = Project::with('avenues')->findOrFail($id);
        return view('projects.show', compact('project', 'recentProjects'));
    }

    public function edit(string $id)
    {
        $project = Project::with('avenues')->findOrFail($id);
        $avenues = Avenue::all();
        return view('projects.edit', compact('project', 'avenues'));
    }

    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'coverimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'avenue_id' => 'required|array',
            'avenue_id.*' => 'exists:avenues,id',
        ]);

        $formFields['description'] = $request->description;
        $dom = new DOMDocument();
        $dom->loadHtml($formFields['description'], 9);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img){
            if (strpos($img->getAttribute('src'), 'data:image') !== false) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/projects/" . time(). $key . '.png'; // FIXED: was /project/
                
                if (!file_exists(public_path() . '/projects')) {
                    mkdir(public_path() . '/projects', 0755, true);
                }
                
                file_put_contents(public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $formFields['description'] = $dom->saveHTML();

        if ($request->hasFile('coverimage')) {
            try {
                if ($project->coverimage && Storage::disk('public')->exists($project->coverimage)) {
                    Storage::disk('public')->delete($project->coverimage);
                }
                
                $filename = $request->file('coverimage')->store('uploads', 'public');
                
                if (!Storage::disk('public')->exists($filename)) {
                    return back()->withErrors(['coverimage' => 'Failed to save cover image.'])->withInput();
                }
                
                $formFields['coverimage'] = $filename;
            } catch (\Exception $e) {
                return back()->withErrors(['coverimage' => 'Error: ' . $e->getMessage()])->withInput();
            }
        }

        $project->update($formFields);
        $project->avenues()->sync($request->avenue_id);

        return redirect()->route('projects.index')->with('message', 'Project Updated Successfully!');
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        if ($project->coverimage && Storage::disk('public')->exists($project->coverimage)) {
            Storage::disk('public')->delete($project->coverimage);
        }

        $project->avenues()->detach();
        $project->delete();

        return redirect()->route('projects.index')->with('message', 'Project Deleted Successfully!');
    }
}