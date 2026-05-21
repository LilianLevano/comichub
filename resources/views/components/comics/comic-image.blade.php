@props([
    'path' => null,
    'title',
])

@if($path)
    <img src="{{ asset('storage/' . $path) }}" alt="{{ $title }}" class="w-[288px] h-[445px] object-cover rounded-xl">
@else
    <img src="{{ asset('dummy-image.jpg') }}" alt="{{ $title }}" class="w-[288px] h-[445px] object-cover rounded-xl">
@endif

