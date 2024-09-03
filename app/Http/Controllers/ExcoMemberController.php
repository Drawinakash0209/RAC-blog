<?php

namespace App\Http\Controllers;

use App\Models\ExcoMember;
use Illuminate\Http\Request;

class ExcoMemberController extends Controller
{

  

    public function index()
    {return view('Exco.index', [
        'members' => ExcoMember::all(),
    ]);
    }

    public function exco()
    {return view('Exco.exco', [
        'excoMembers' => ExcoMember::all(),
    ]);
    }
    

    public function show(ExcoMember $excoMember)
    {
        return view('exco.show', compact('excoMember'));
    }

    public function create()
    {
        return view('Exco.create');
    }

    public function edit(ExcoMember $excoMember)
    {
        return view('Exco.edit', ['member' => $excoMember]);
    }


    public function update(Request $request, ExcoMember $excoMember)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'email' => 'required|email',
            'about' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone' => 'required',
            'linkedin' => 'nullable|url', // Added validation for linkedin
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('exco', 'public');
        }

        $excoMember->update($formFields);

        return redirect('exco')->with('message', 'Exco Member Updated Successfully!');
    }

    public function destroy(ExcoMember $excoMember)
    {
        $excoMember->delete();
        return redirect('exco')->with('message', 'Exco Member Deleted Successfully!');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'email' => 'required',
            'about' => 'required',
            'phone' => 'required',
            'linkedin' => 'nullable|url', // Added validation for linkedin
        ]);

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('exco', 'public');        
        }

        ExcoMember::create($formFields);

        return redirect('exco')->with('message', 'Exco Member Created Successfully!');}
    //
}
