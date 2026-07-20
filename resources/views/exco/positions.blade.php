<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="container mx-auto p-6 font-mono">

        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <header class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-center font-bold uppercase">
                Manage Exco Positions
            </h1>
            <a href="/exco" class="text-blue-400 text-base font-semibold py-2.5 px-6 border-2 border-white rounded hover:bg-white hover:text-black transition duration-300 ease-in-out">
                &larr; Back to Exco Members
            </a>
        </header>

        <p class="text-sm text-gray-600 mb-6">
            These are the options shown in the Position dropdown when adding or editing an Exco member.
            Renaming a position updates its label everywhere it's used. Deleting one won't break existing
            members already assigned to it &mdash; they'll just show a plain auto-formatted label instead.
        </p>

        @if ($errors->any())
        <div class="alert alert-danger mb-4">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Slug</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @forelse ($positions as $position)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <form action="{{ route('exco-positions.update', $position) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" value="{{ $position->name }}" class="rounded-md border-0 py-1 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 text-sm">
                                    <button type="submit" class="text-blue-400 px-2 py-1 rounded hover:bg-blue-100 text-sm">Rename</button>
                                </form>
                            </td>
                            <td class="px-4 py-3 border text-gray-500 text-sm">{{ $position->slug }}</td>
                            <td class="px-4 py-3 border">
                                <form action="{{ route('exco-positions.destroy', $position) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this position? Existing members using it will keep working, just with a plain label.');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 px-3 py-2 rounded hover:bg-red-100">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-3 border text-center">No positions yet.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Add a New Position</h2>
            <form action="{{ route('exco-positions.store') }}" method="POST" class="flex items-end gap-3">
                @csrf
                <div class="flex-1">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g. Joint-Secretary" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Add</button>
            </form>
        </div>

    </section>
</x-app-layout>
