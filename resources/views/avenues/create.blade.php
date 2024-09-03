<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
    </x-slot>
<div class="container mt-10 mb-10 mx-auto px-4">
    
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>     
    @endforeach
</div>
@endif

<form action="{{ route('avenues.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Avenue</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly, so be careful what you share.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        
        <!-- Avenue Name -->
        <div class="sm:col-span-3">
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Avenue name</label>
          <div class="mt-2">
            <input type="text" name="name" id="name" autocomplete="name" 
                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm 
                          ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                          focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                   value="{{ old('name') }}">
          </div>
        </div>

        <!-- Avenue Logo -->
        <div class="sm:col-span-3">
            <label for="logo" class="block text-sm font-medium leading-6 text-gray-900">Avenue logo (Kindly use icon link)</label>
            <div class="mt-2">
              <input type="text" name="logo" id="logo" autocomplete="logo" 
                     class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                            focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                     value="{{ old('logo') }}">
            </div>
        </div>

        <!-- Description -->
        <div class="sm:col-span-6">
          <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
          <div class="mt-2">
            <textarea name="description" id="description" rows="4" 
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm 
                             ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                             focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
          </div>
        </div>

        <!-- Cover Image -->
        <div class="sm:col-span-6">
          <label for="cover_image" class="block text-sm font-medium leading-6 text-gray-900">Cover Image</label>
          <div class="mt-2">
            <input type="file" name="cover_image" id="cover_image" 
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg 
                          cursor-pointer bg-gray-50 focus:outline-none"
                   accept="image/*">
          </div>
        </div>

      </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="{{ route('avenues.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm 
                                hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 
                                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </div>
</form>
</div>
</x-app-layout>
