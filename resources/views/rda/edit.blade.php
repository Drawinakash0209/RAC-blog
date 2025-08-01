<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="container mt-10 mb-10 mx-auto px-4">
        <h1>Edit Event</h1>

        @if (session('message'))
            <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('rda.update', $rda) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Event Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $rda->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <h3 class="text-lg font-semibold mb-4">Awards</h3>
            <div id="awards-container">
                @foreach($rda->awards as $index => $award)
                    <div class="award mb-4 p-4 border rounded" id="award_{{ $index }}">
                        <label for="award_name_{{ $index }}" class="block text-sm font-medium text-gray-700">Award Name</label>
                        <input type="text" name="awards[{{ $index }}][name]" id="award_name_{{ $index }}" value="{{ old("awards.$index.name", $award->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error("awards.$index.name")
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror

                        <label for="award_image_{{ $index }}" class="block text-sm font-medium text-gray-700 mt-2">Award Image (PNG)</label>
                        <input type="file" name="awards[{{ $index }}][image]" id="award_image_{{ $index }}" accept="image/*" class="mt-1 block w-full">
                        @error("awards.$index.image")
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror

                        <input type="hidden" name="awards[{{ $index }}][id]" value="{{ $award->id }}">
                        <img src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->name }}" class="mt-2" width="100">
                        <button type="button" onclick="removeAward({{ $index }})" class="mt-2 text-red-600 hover:text-red-900">Remove Award</button>
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addAward()" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Add Another Award</button>

            <button type="submit" class="mt-4 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500">Update Event</button>
        </form>

        <script>
            let awardIndex = {{ $rda->awards->count() }};

            function addAward() {
                const container = document.getElementById('awards-container');
                const newAward = document.createElement('div');
                newAward.classList.add('award', 'mb-4', 'p-4', 'border', 'rounded');
                newAward.id = `award_${awardIndex}`;
                newAward.innerHTML = `
                    <label for="award_name_${awardIndex}" class="block text-sm font-medium text-gray-700">Award Name</label>
                    <input type="text" name="awards[${awardIndex}][name]" id="award_name_${awardIndex}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <label for="award_image_${awardIndex}" class="block text-sm font-medium text-gray-700 mt-2">Award Image (PNG)</label>
                    <input type="file" name="awards[${awardIndex}][image]" id="award_image_${awardIndex}" accept="image/*" required class="mt-1 block w-full">
                    <button type="button" onclick="removeAward(${awardIndex})" class="mt-2 text-red-600 hover:text-red-900">Remove Award</button>
                `;
                container.appendChild(newAward);
                awardIndex++;
            }

            function removeAward(index) {
                const awardDiv = document.getElementById(`award_${index}`);
                awardDiv.remove();
            }
        </script>
    </div>
</x-app-layout>