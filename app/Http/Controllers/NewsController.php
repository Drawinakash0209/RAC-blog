<?php

namespace App\Http\Controllers;

use App\Models\news;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => news::all(),
        ]);
    }

    public function show(news $new)
    {
        return view('news.show', compact('new'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function edit(news $new)
    {
        return view('news.edit', [
            'new' => $new,
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $formFields['description'] = $request->description;

        $dom = new DOMDocument();
        $dom->loadHtml($formFields['description'], 9);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img){
            if (strpos($img->getAttribute('src'), 'data:image') !== false) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/news/" . time(). $key . '.png'; // FIXED: was /new/
                
                if (!file_exists(public_path() . '/news')) {
                    mkdir(public_path() . '/news', 0755, true);
                }
                
                file_put_contents(public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $formFields['description'] = $dom->saveHTML();

        if($request->hasFile('coverimage')){
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

        if($request->hasFile('image')){
            try {
                $filename = $request->file('image')->store('news', 'public');
                
                if (!Storage::disk('public')->exists($filename)) {
                    return back()->withErrors(['image' => 'Failed to save image.'])->withInput();
                }
                
                $formFields['image'] = $filename;
            } catch (\Exception $e) {
                return back()->withErrors(['image' => 'Error: ' . $e->getMessage()])->withInput();
            }
        }

        news::create($formFields);
        return redirect('news')->with('message', 'News Created Successfully!');
    }

    public function update(Request $request, news $new)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $formFields['description'] = $request->description;

        $dom = new DOMDocument();
        $dom->loadHtml($formFields['description'], 9);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img){
            if (strpos($img->getAttribute('src'), 'data:image') !== false) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/news/" . time(). $key . '.png'; // FIXED: was /new/
                
                if (!file_exists(public_path() . '/news')) {
                    mkdir(public_path() . '/news', 0755, true);
                }
                
                file_put_contents(public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $formFields['description'] = $dom->saveHTML();

        if($request->hasFile('image')){
            try {
                if ($new->image && Storage::disk('public')->exists($new->image)) {
                    Storage::disk('public')->delete($new->image);
                }
                
                $filename = $request->file('image')->store('news', 'public');
                
                if (!Storage::disk('public')->exists($filename)) {
                    return back()->withErrors(['image' => 'Failed to save image.'])->withInput();
                }
                
                $formFields['image'] = $filename;
            } catch (\Exception $e) {
                return back()->withErrors(['image' => 'Error: ' . $e->getMessage()])->withInput();
            }
        }

        $new->update($formFields);
        return redirect('news')->with('message', 'News Updated Successfully!');
    }

    public function destroy(news $new)
    {
        if ($new->image && Storage::disk('public')->exists($new->image)) {
            Storage::disk('public')->delete($new->image);
        }
        
        $new->delete();
        return redirect('news')->with('message', 'News Deleted Successfully!');
    }
}