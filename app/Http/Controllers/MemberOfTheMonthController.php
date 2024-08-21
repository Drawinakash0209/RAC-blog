<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\MemberOfTheMonth;

class MemberOfTheMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = MemberOfTheMonth::all();
        return view('member-of-the-month.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member-of-the-month.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store
        $formFields = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('members', 'public');
        }

        MemberOfTheMonth::create($formFields);

        return redirect('members-of-the-month')->with('message', 'Member of the Month Added Successfully!');

        



        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //edit page
        $member = MemberOfTheMonth::find($id);
        return view('member-of-the-month.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //update
        $formFields = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $member = MemberOfTheMonth::find($id);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('members', 'public');
        }

        $member->update($formFields);

        return redirect('members-of-the-month')->with('message', 'Member of the Month Updated Successfully!');


   
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete
        $member = MemberOfTheMonth::find($id);
        $member->delete();
        return redirect('members-of-the-month')->with('message', 'Member of the Month Deleted Successfully!');
    }
}
