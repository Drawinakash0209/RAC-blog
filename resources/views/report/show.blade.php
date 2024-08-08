@extends('layout')

@section('content')
<div class="container mx-auto px-4 mt-10 mb-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">{{ $report->title }}</h2>

    <embed src="{{ asset('storage/' . $report->file_path) }}" type="application/pdf" width="100%" height="600px" />
    
</div>
@endsection
