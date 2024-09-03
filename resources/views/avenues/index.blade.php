<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
      </x-slot>

<section class="container mx-auto p-6 font-mono">

    @if(session('message'))
    <div class="alert alert-success">{{session('message')}} </div>
    @endif
    
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-3xl text-center font-bold uppercase">
            Manage Your Avenues 
        </h1>
        <a href="/avenues/create" class="text-blue-400 text-base font-semibold py-2.5 px-6 border-2 border-white rounded hover:bg-white hover:text-black transition duration-300 ease-in-out">
            <i class="fa-solid fa-plus"></i> Add Avenues
        </a>
    </header>

    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @unless ($avenues->isEmpty())
                    @foreach ($avenues as $avenue) 
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <a href="show.html" class="text-blue-500 hover:underline">
                                    {{ $avenue->name }}
                                </a>
                            </td>
                            <td class="px-4 py-3 border">
                                <div class="flex space-x-4">
                                    <a href="{{ route('avenues.edit', $avenue) }}" class="text-blue-400 px-3 py-2 rounded hover:bg-blue-100">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('avenues.destroy', $avenue) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 px-3 py-2 rounded hover:bg-red-100">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2" class="px-4 py-3 border text-center">You have no avenue yet.</td>
                    </tr>
                @endunless
                </tbody>
            </table>
        </div>
    </div>

</section>
</x-app-layout>