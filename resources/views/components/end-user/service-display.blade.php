@props(['service'])
<div class="feature">
    <div class="icon">
        <img src="{{ asset('storage/' . $service->images->first()->path) }}" alt="Image" class="imf-fluid">
    </div>
    <h3>{{ $service->title }}</h3>
    <p>{{ $service->details }}</p>
</div>