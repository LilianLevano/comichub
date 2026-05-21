@props(['tags'])

@if($tags->isNotEmpty())
    <div class="flex flex-wrap gap-2">
        @foreach($tags as $tag)
            <a href="{{ route('tags.show', $tag->id) }}" class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-md hover:bg-blue-100 hover:text-blue-600 transition">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
@endif
