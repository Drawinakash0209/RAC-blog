<?php

namespace App\Http\Controllers;

use App\Models\ExcoPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExcoPositionController extends Controller
{
    public function index()
    {
        return view('exco.positions', [
            'positions' => ExcoPosition::orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $slug = Str::slug($request->input('name'), '_');
        $original = $slug;
        $suffix = 2;
        while (ExcoPosition::where('slug', $slug)->exists()) {
            $slug = $original.'_'.$suffix;
            $suffix++;
        }

        $maxOrder = ExcoPosition::max('sort_order') ?? 0;

        ExcoPosition::create([
            'name' => $request->input('name'),
            'slug' => $slug,
            'sort_order' => $maxOrder + 1,
        ]);

        return redirect()->route('exco-positions.index')->with('message', 'Position added successfully!');
    }

    public function update(Request $request, ExcoPosition $excoPosition)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $excoPosition->update(['name' => $request->input('name')]);

        return redirect()->route('exco-positions.index')->with('message', 'Position updated successfully!');
    }

    public function destroy(ExcoPosition $excoPosition)
    {
        $excoPosition->delete();

        return redirect()->route('exco-positions.index')->with('message', 'Position deleted successfully!');
    }
}
