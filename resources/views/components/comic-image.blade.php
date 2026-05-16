@props([
    'path',
    'title',
])

<img src="{{ asset('storage/' . $path) }}" alt="{{ $title }}" class="w-[288px] h-[445px] object-cover rounded-xl">
