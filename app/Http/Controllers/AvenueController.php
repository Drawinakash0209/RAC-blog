<?php

namespace App\Http\Controllers;

use App\Models\Avenue;
use Illuminate\Http\Request;

class AvenueController extends Controller
{
    




    public function index()
    {return view('avenues.index', [
        'avenues' => Avenue::all(),
    ]);
    } 


    //show method

 public function show($id)
    {
        $avenue = Avenue::with(['directors', 'projects'])->findOrFail($id);
        return view('avenues.show', compact('avenue'));
    }

    public function create()
    {
        return view('avenues.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'logo' => 'required',
        ]);

        Avenue::create($formFields);

        return redirect('avenues')->with('message', 'Avenue Created Successfully!');
}

    // public function show(Avenue $avenue)
    // {
    //     return view('avenues.show', [
    //         'avenue' => $avenue,
    //     ]);
    // }

    public function edit(Avenue $avenue)
    {
        return view('avenues.edit', [
            'avenue' => $avenue,
        ]);
    }

    public function update(Request $request, Avenue $avenue)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'logo' => 'required',
        ]);

        $avenue->update($formFields);

        return redirect('avenues')->with('message', 'Avenue Updated Successfully!');
    }

    public function destroy(Avenue $avenue)
    {
        $avenue->delete();

        return redirect('avenues')->with('message', 'Avenue Deleted Successfully!');
    }

}