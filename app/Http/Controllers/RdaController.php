<?php

namespace App\Http\Controllers;

use App\Models\Rda;
use Illuminate\Http\Request;

class RdaController extends Controller
{
    public function index()
    {
        $rda = Rda::with('awards')->latest()->get();
        return view('rda.index', compact('rda'));
    }

    public function create()
    {
        return view('rda.create');
    }

    public function awards()
    { 
        $rda = Rda::with('awards')->latest()->get();
        return view('rda.awards', compact('rda'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'awards' => 'array',
            'awards.*.name' => 'required',
            'awards.*.image' => 'required',
        ]);

        $event = Rda::create(['name' => $request->name]);

        foreach ($request->awards as $awardData) {
            $imagePath = $awardData['image']->store('awards', 'public');
            $event->awards()->create([
                'name' => $awardData['name'],
                'image' => $imagePath,
            ]);
        }

        return redirect()->route('rda.index')->with('success', 'Event and awards created successfully.');
    }

}
