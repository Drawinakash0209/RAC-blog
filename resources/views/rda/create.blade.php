
@extends('layout')

@section('content')
    
    <h1>Create Event</h1>

    <form action="{{ route('rda.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Event Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <h3>Awards</h3>
        <div id="awards-container">
            <div class="award">
                <label for="award_name_0">Award Name</label>
                <input type="text" name="awards[0][name]" id="award_name_0" required>
                <label for="award_image_0">Award Image (PNG)</label>
                <input type="file" name="awards[0][image]" id="award_image_0" accept="image" required>
            </div>
        </div>
        <button type="button" onclick="addAward()">Add Another Award</button>

        <button type="submit">Save Event</button>
    </form>

    <script>
        let awardIndex = 1;

        function addAward() {
    const container = document.getElementById('awards-container');
    const newAward = document.createElement('div');
    newAward.classList.add('award');
    newAward.innerHTML = `
        <label for="award_name_${awardIndex}">Award Name</label>
        <input type="text" name="awards[${awardIndex}][name]" id="award_name_${awardIndex}" required>
        <label for="award_image_${awardIndex}">Award Image (PNG)</label>
        <input type="file" name="awards[${awardIndex}][image]" id="award_image_${awardIndex}" accept="image" required>
    `;
    container.appendChild(newAward);
    awardIndex++;
}
    </script>

@endsection