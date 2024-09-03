<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
      </x-slot>
<div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Annual Reports</h2>
    <a href="{{ route('annual-reports.create') }}" class="btn btn-primary mb-4">Add New Report</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td class="border px-4 py-2">{{ $report->title }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('annual-reports.show', $report->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('annual-reports.edit', $report->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('annual-reports.destroy', $report->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>