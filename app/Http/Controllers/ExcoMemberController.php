<?php

namespace App\Http\Controllers;

use App\Models\ExcoMember;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class ExcoMemberController extends Controller
{



    public function index()
    {return view('Exco.index', [
        'members' => ExcoMember::orderBy('sort_order')->orderBy('id')->get(),
    ]);
    }

    public function exco()
    {return view('Exco.exco', [
        'excoMembers' => ExcoMember::orderBy('sort_order')->orderBy('id')->get(),
        'heroImage' => SiteContent::getValue('exco_hero_image'),
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'phone' => 'required',
            'linkedin' => 'nullable|url', // Added validation for linkedin
            'sort_order' => 'nullable|integer',
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'phone' => 'required',
            'linkedin' => 'nullable|url', // Added validation for linkedin
            'sort_order' => 'nullable|integer',
        ]);

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('exco', 'public');        
        }

        ExcoMember::create($formFields);

        return redirect('exco')->with('message', 'Exco Member Created Successfully!');}
    //
}
