<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(5);
        return view('events.index', compact('events'));
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        $formFields['description'] = $request->description;

        $dom = new DOMDocument();
        $dom->loadHtml($formFields['description'], 9);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img){
            if (strpos($img->getAttribute('src'), 'data:image') !== false) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/events/" . time(). $key . '.png'; // FIXED: was /even/
                
                if (!file_exists(public_path() . '/events')) {
                    mkdir(public_path() . '/events', 0755, true);
                }
                
                file_put_contents(public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $formFields['description'] = $dom->saveHTML();

        if ($request->hasFile('image')) {
            try {
                $filename = $request->file('image')->store('events', 'public');
                
                if (!Storage::disk('public')->exists($filename)) {
                    return back()->withErrors(['image' => 'Failed to save image.'])->withInput();
                }
                
                $formFields['image'] = $filename;
            } catch (\Exception $e) {
                return back()->withErrors(['image' => 'Error: ' . $e->getMessage()])->withInput();
            }
        }

        Event::create($formFields);
        return redirect()->route('events.index')->with('message', 'Event Created Successfully!');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        $formFields['description'] = $request->description;

        $dom = new DOMDocument();
        $dom->loadHtml($formFields['description'], 9);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img){
            if (strpos($img->getAttribute('src'), 'data:image') !== false) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/events/" . time(). $key . '.png'; // FIXED: was /even/
                
                if (!file_exists(public_path() . '/events')) {
                    mkdir(public_path() . '/events', 0755, true);
                }
                
                file_put_contents(public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $formFields['description'] = $dom->saveHTML();

        if ($request->hasFile('image')) {
            try {
                $event = Event::findOrFail($id);
                
                if ($event->image && Storage::disk('public')->exists($event->image)) {
                    Storage::disk('public')->delete($event->image);
                }
                
                $filename = $request->file('image')->store('events', 'public');
                
                if (!Storage::disk('public')->exists($filename)) {
                    return back()->withErrors(['image' => 'Failed to save image.'])->withInput();
                }
                
                $formFields['image'] = $filename;
            } catch (\Exception $e) {
                return back()->withErrors(['image' => 'Error: ' . $e->getMessage()])->withInput();
            }
        }

        Event::findOrFail($id)->update($formFields);
        return redirect()->route('events.index')->with('message', 'Event Updated Successfully!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }
        
        $event->delete();
        return redirect()->route('events.index')->with('message', 'Event Deleted Successfully!');
    }
}