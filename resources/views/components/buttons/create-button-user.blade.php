@props([
    'link',
    'content'
])

@auth
    <a href="{{ $link }}" class="bg-gray-800 text-white text-sm px-4 py-2 rounded-lg hover:bg-gray-700 transition">
        {{$content}}
    </a>
@endauth
