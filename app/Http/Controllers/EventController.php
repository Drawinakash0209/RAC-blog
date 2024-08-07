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

    //for create 
    public function create(){
        return view('events.create');
    }

    //for store
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        
        $formFields['description'] = $request->description;

        $dom = new DOMDocument();
        $dom -> loadHtml($formFields['description'], 9);

        $images = $dom->getElementsByTagName('img');


        foreach($images as $key => $img){
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/even/" . time(). $key . '.png'; 
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);

           }
           $formFields['description'] = $dom->saveHTML();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('events', 'public');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        
        $formFields['description'] = $request->description;

        $dom = new DOMDocument();
        $dom -> loadHtml($formFields['description'], 9);

        $images = $dom->getElementsByTagName('img');


        foreach($images as $key => $img){
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/even/" . time(). $key . '.png'; 
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);

           }
           $formFields['description'] = $dom->saveHTML();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('events', 'public');
        }
       

        Event::findOrFail($id)->update($formFields);

        return redirect()->route('events.index')->with('message', 'Event Updated Successfully!');
    }

    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->route('events.index')->with('message', 'Event Deleted Successfully!');
    }

}
