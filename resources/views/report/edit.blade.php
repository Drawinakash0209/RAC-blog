<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
      </x-slot>
<div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Edit Annual Report</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('annual-reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $report->title }}" class="block w-full mt-1" required>
            </div>

            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                <input type="text" name="year" id="year" value="{{ $report->year }}" class="block w-full mt-1" placeholder="YYYY" required>
            </div>

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">PDF File</label>
                <input type="file" name="file" id="file" class="block w-full mt-1" accept="application/pdf">
                @if ($report->file_path)
                    <p class="text-sm text-gray-500 mt-1">Current file: <a href="{{ asset($report->file_path) }}" target="_blank">{{ basename($report->file_path) }}</a></p>
                @endif
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                <input type="file" name="image" id="image" class="block w-full mt-1" accept="image/*">
                @if ($report->image_path)
                    <p class="text-sm text-gray-500 mt-1">Current image: <img src="{{ asset($report->image_path) }}" alt="Cover Image" class="mt-2 max-w-xs"></p>
                @endif
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
</x-app-layout>
