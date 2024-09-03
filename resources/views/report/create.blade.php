<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
      </x-slot>
<div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Add New Annual Report</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('annual-reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="block w-full mt-1" required>
            </div>

            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                <input type="text" name="year" id="year" class="block w-full mt-1" placeholder="YYYY/YYYY" required>
            </div>

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">PDF File</label>
                <input type="file" name="file" id="file" class="block w-full mt-1" accept="application/pdf" required>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                <input type="file" name="image" id="image" class="block w-full mt-1" accept="image/*" required>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
</x-app-layout>
