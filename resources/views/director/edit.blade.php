@extends('layout')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>
<div class="container mt-10 mb-10 mx-auto px-4">
    
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>     
    @endforeach
</div>
@endif

<form action="{{ route('directors.update', $director) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Director</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Director name</label>
          <div class="mt-2">
            <input type="text" name="name" id="name" value="{{ old('name', $director->name) }}" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
            <label for="avenue_id" class="block text-sm font-medium leading-6 text-gray-900">Avenue</label>
            <div class="mt-2">
                <select name="avenue_id" id="avenue_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @foreach($avenues as $avenue)
                        <option value="{{ $avenue->id }}" @if($director->avenue_id == $avenue->id) selected @endif>{{ $avenue->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="sm:col-span-4">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" value="{{ old('email', $director->email) }}" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-4">
            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
            <div class="mt-2">
              <input id="phone" name="phone" type="text" value="{{ old('phone', $director->phone) }}" autocomplete="phone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
            <div class="mt-2">
              <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('about', $director->about) }}</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
          </div>

          <div class="sm:col-span-4">
            <label for="linkedin" class="block text-sm font-medium leading-6 text-gray-900">Linkedin</label>
            <div class="mt-2">
              <input id="linkedin" name="linkedin" type="text" value="{{ old('linkedin', $director->linkedin) }}" autocomplete="linkedin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
            <input type="file" name="image">
          </div>

      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="{{ route('directors.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
    </div>
  </div>
</form>
</div>

@endsection
