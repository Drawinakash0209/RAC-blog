@extends('layout')

@section('title', 'Our Reports')
@section('meta-description', 'Explore our impactful reports designed to make a difference in our community and beyond. From annual reviews to special projects, our reports embody our commitment to positive change and transparency.')
@section('meta-keywords', 'reports, annual reviews, special projects, community impact')

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "headline": "Our Reports",
    "description": "Explore our impactful reports designed to make a difference in our community and beyond. From annual reviews to special projects, our reports embody our commitment to positive change and transparency.",
    "itemListElement": [
        @foreach($reports as $report)
        {
            "@type": "Report",
            "headline": "{{ $report->title }}",
            "description": "{{ Str::limit(strip_tags($report->description), 150) }}",
            "image": "{{ $report->image ? asset('storage/' . $report->image) : 'https://source.unsplash.com/random/640x480' }}",
            "url": "{{ route('annual-reports.show', $report->id) }}",
            "datePublished": "{{ $report->created_at->toIso8601String() }}",
            "dateModified": "{{ $report->updated_at->toIso8601String() }}"
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endsection

@section('content')

<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Reports</h2>
    <p class="text-gray-600 text-center mb-12">Explore our impactful reports designed to make a difference in our community and beyond. From annual reviews to special projects, our reports embody our commitment to positive change and transparency.</p>

    <!-- Grid -->
    <div class="grid gap-6">

        @foreach($reports as $report)
        <!-- Card -->
        <div class="bg-black text-white rounded-lg overflow-hidden shadow-lg dark:bg-gray-900">
            <div class="container grid grid-cols-12 mx-auto">
                <div class="col-span-full lg:col-span-4 min-h-[200px] sm:min-h-[300px] flex items-center justify-center">
                    <img src="{{ $report->image ? asset('storage/' . $report->image) : 'https://source.unsplash.com/random/640x480' }}" alt="{{ $report->title }}" class="object-cover w-full h-full">
                </div>
                <div class="flex flex-col p-6 col-span-full row-span-full lg:col-span-8 lg:p-10">
                    <div class="flex justify-start mb-4">
                        <span class="px-3 py-2 text-base rounded-full bg-white text-black">{{ $report->year }}</span>
                    </div>
                    <h1 class="text-4xl font-bold mb-4">{{ $report->title }}</h1>
                    <p class="flex-1 text-lg">{{ Str::limit($report->description, 150, '...') }}</p>
                    <a rel="noopener noreferrer" href="{{ route('annual-reports.show', $report->id) }}" class="inline-flex items-center pt-2 pb-6 space-x-2 text-sm text-blue-300 hover:text-blue-400">
                        <span>Read more</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->

@endsection
