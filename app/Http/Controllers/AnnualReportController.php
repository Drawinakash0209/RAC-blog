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

    public function reports()
    {
        $reports = AnnualReport::all();
        return view('report.report', compact('reports'));
    }

    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required',
            'file' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $filePath = $request->file('file')->store('reports', 'public');

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('report_images', 'public');
        }

        AnnualReport::create([
            'title' => $request->title,
            'year' => $request->year,
            'file_path' => $filePath,
            'image_path' => $imagePath,
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
            'year' => 'required',
            'file' => 'file',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $report = AnnualReport::findOrFail($id);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($report->file_path);
            $filePath = $request->file('file')->store('reports', 'public');
            $report->file_path = $filePath;
        }

        if ($request->hasFile('image')) {
            if ($report->image) {
                Storage::disk('public')->delete($report->image);
            }
            $image = $request->file('image')->store('report_images', 'public');
            $report->image = $image;
        }

        $report->title = $request->title;
        $report->year = $request->year;
        $report->save();

        return redirect()->route('annual-reports.index')->with('success', 'Annual Report updated successfully.');
    }

    public function destroy($id)
    {
        $report = AnnualReport::findOrFail($id);
        Storage::disk('public')->delete($report->file_path);
        if ($report->image_path) {
            Storage::disk('public')->delete($report->image_path);
        }
        $report->delete();

        return redirect()->route('annual-reports.index')->with('success', 'Annual Report deleted successfully.');
    }
}