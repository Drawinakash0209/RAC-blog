<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('testimonial', 'public');
        }
        Testimonial::create($formFields);

        return redirect('/testimonials')->with('success', 'Testimonial created successfully.');
    }

    public function show($id)
    {
        $testimonial = Testimonial::find($id);
        return view('testimonials.show', compact('testimonial'));
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('testimonial', 'public');
        }

        Testimonial::findOrFail($id)->update($formFields);

        return redirect('/testimonials')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete the image file if it exists
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
    
        $testimonial->delete();

        return redirect('/testimonials')->with('success', 'Testimonial deleted successfully.');
    }
}
