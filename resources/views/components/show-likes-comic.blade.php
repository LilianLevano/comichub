@props(['comic'])

@auth
    @if($comic->isLikedBy(auth()->user()))
        <form method="POST" action="{{ route('comics.unlike', $comic) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full border border-red-300 bg-red-50 text-red-700 text-sm cursor-pointer hover:bg-red-100 transition-colors">
                ❤️ {{ $comic->likedByUsers()->count() }}
            </button>
        </form>
    @else
        <form method="POST" action="{{ route('comics.like', $comic) }}">
            @csrf
            <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full border border-gray-500 text-gray-500 text-sm cursor-pointer hover:bg-gray-50 transition-colors">
                🤍 {{ $comic->likedByUsers()->count() }}
            </button>
        </form>
    @endif
@endauth
