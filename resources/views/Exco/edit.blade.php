<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Exco Member') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('exco.update', $member) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Profile</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" autocomplete="name" value="{{ $member->name }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="position" class="block text-sm font-medium leading-6 text-gray-900">Position</label>
                            <div class="mt-2">
                                <select id="position" name="position" autocomplete="position" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="president" {{ $member->position == 'president' ? 'selected' : '' }}>President</option>
                                    <option value="secretary" {{ $member->position == 'secretary' ? 'selected' : '' }}>Secretary</option>
                                    <option value="vice_president" {{ $member->position == 'vice_president' ? 'selected' : '' }}>Vice President</option>
                                    <option value="assistant_secretary" {{ $member->position == 'assistant_secretary' ? 'selected' : '' }}>Assistant Secretary</option>
                                    <option value="sergeant_at_arms" {{ $member->position == 'sergeant_at_arms' ? 'selected' : '' }}>Sergeant At Arms</option>
                                    <option value="treasurer" {{ $member->position == 'treasurer' ? 'selected' : '' }}>Treasurer</option>
                                    <option value="assistant_treasurer" {{ $member->position == 'assistant_treasurer' ? 'selected' : '' }}>Assistant Treasurer</option>
                                    <option value="editor_posters_videos" {{ $member->position == 'editor_posters_videos' ? 'selected' : '' }}>Editor - Posters/Videos</option>
                                    <option value="editor_content_writer" {{ $member->position == 'editor_content_writer' ? 'selected' : '' }}>Editor - Content Writer</option>
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" value="{{ $member->email }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                            <div class="mt-2">
                                <input id="phone" name="phone" type="text" autocomplete="phone" value="{{ $member->phone }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="linkedin" class="block text-sm font-medium leading-6 text-gray-900">LinkedIn Profile URL</label>
                            <div class="mt-2">
                                <input id="linkedin" name="linkedin" type="url" autocomplete="linkedin" value="{{ $member->linkedin }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
                            <div class="mt-2">
                                <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $member->about }}</textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
                        </div>
                        <div class="col-span-full">
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                            @if ($member->image)
                                <div class="mt-2 mb-4">
                                    <img src="{{ asset('storage/' . $member->image) }}" alt="Current Photo" class="w-32 h-32 object-cover rounded-md">
                                </div>
                            @endif
                            <input type="file" name="image" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
