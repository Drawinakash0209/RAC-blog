<?php

namespace App\Http\Controllers;

use App\Models\Rda;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function show($id)
    {
        $rda = Rda::with('awards')->findOrFail($id);
        return view('rda.show', compact('rda'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'awards' => 'array',
            'awards.*.name' => 'required',
            'awards.*.image' => 'required|image',
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

    public function edit($id)
    {
        $rda = Rda::with('awards')->findOrFail($id);
        return view('rda.edit', compact('rda'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'awards' => 'array',
            'awards.*.name' => 'required',
            'awards.*.image' => 'nullable|image',
        ]);

        $rda = Rda::findOrFail($id);
        $rda->update(['name' => $request->name]);

        // Track existing award IDs to identify deletions
        $existingAwardIds = [];
        foreach ($request->awards as $index => $awardData) {
            if (isset($awardData['id'])) {
                // Update existing award
                $award = Award::findOrFail($awardData['id']);
                $awardDataUpdate = ['name' => $awardData['name']];
                
                if (isset($awardData['image'])) {
                    // Delete old image
                    Storage::disk('public')->delete($award->image);
                    // Store new image
                    $awardDataUpdate['image'] = $awardData['image']->store('awards', 'public');
                }
                
                $award->update($awardDataUpdate);
                $existingAwardIds[] = $award->id;
            } else {
                // Create new award
                $imagePath = $awardData['image']->store('awards', 'public');
                $newAward = $rda->awards()->create([
                    'name' => $awardData['name'],
                    'image' => $imagePath,
                ]);
                $existingAwardIds[] = $newAward->id;
            }
        }

        // Delete awards that were removed
        $rda->awards()->whereNotIn('id', $existingAwardIds)->each(function ($award) {
            Storage::disk('public')->delete($award->image);
            $award->delete();
        });

        return redirect()->route('rda.index')->with('success', 'Event and awards updated successfully.');
    }

    public function destroy($id)
    {
        $rda = Rda::findOrFail($id);
        
        // Delete associated awards and their images
        foreach ($rda->awards as $award) {
            Storage::disk('public')->delete($award->image);
            $award->delete();
        }
        
        // Delete the event
        $rda->delete();

        return redirect()->route('rda.index')->with('success', 'Event and associated awards deleted successfully.');
    }
}