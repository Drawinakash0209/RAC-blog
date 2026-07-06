<div class="flex min-h-screen flex-col items-center justify-center bg-gray-50 px-4 pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="mt-6 w-full overflow-hidden rounded-2xl bg-white px-6 py-8 shadow-xl ring-1 ring-gray-100 sm:max-w-md sm:px-8">
        {{ $slot }}
    </div>
</div>
