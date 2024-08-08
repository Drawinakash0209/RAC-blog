<?php

namespace App\Http\Controllers;

use App\Models\AnnualReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnualReportController extends Controller
{


    public function index()
    {
        $reports = AnnualReport::all();
        return view('report.index', compact('reports'));
    }

    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('file')->store('reports', 'public');

        AnnualReport::create([
            'title' => $request->title,
            'file_path' => $filePath,
        ]);

        return redirect()->route('annual-reports.index')->with('success', 'Annual Report created successfully.');
    }

    public function show($id)
    {
        $report = AnnualReport::findOrFail($id);
        return view('report.show', compact('report'));
    }

    public function edit($id)
    {
        $report = AnnualReport::findOrFail($id);
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'file|mimes:pdf|max:2048',
        ]);

        $report = AnnualReport::findOrFail($id);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($report->file_path);
            $filePath = $request->file('file')->store('reports', 'public');
            $report->file_path = $filePath;
        }

        $report->title = $request->title;
        $report->save();

        return redirect()->route('annual-reports.index')->with('success', 'Annual Report updated successfully.');
    }

    public function destroy($id)
    {
        $report = AnnualReport::findOrFail($id);
        Storage::disk('public')->delete($report->file_path);
        $report->delete();

        return redirect()->route('annual-reports.index')->with('success', 'Annual Report deleted successfully.');
    }
    //
}
