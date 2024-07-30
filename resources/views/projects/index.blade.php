<!-- resources/views/projects/index.blade.php -->
@extends('layout')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>
<div class="container mt-10 mb-10 mx-auto px-4">

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="flex justify-end mb-4">
    <a href="{{ route('projects.create') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Project</a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($projects as $project)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection
