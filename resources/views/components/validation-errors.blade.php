@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'rounded-lg border border-red-100 bg-red-50 p-4']) }}>
        <div class="font-semibold text-red-700">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-2 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
