<x-site-layout title="Category - {{$comic->title}}">
    <div class="flex flex-col items-center">


    <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex gap-6">
        <img src="{{ $comic->image_path }}" alt="{{ $comic->title }}" class="w-70 h-96 object-cover rounded-xl">
        <div class="flex flex-col gap-2 flex-1">
            <h2 class="text-xl font-bold">{{ $comic->title }}</h2>
            <p class="text-gray-500 text-sm">{{ $comic->description }}</p>
            <div class="flex gap-4 text-sm text-gray-400">
                <span>✍️ {{ $comic->author }}</span>
                <span> <a href="/categories/{{$comic->category->id}}" class="hover:text-blue-400 underline">📁 {{ $comic->category->name }}</a>  </span>
                <span>📅 {{ $comic->release_date }}</span>
            </div>
            <div class="mt-3 pt-3 border-t border-black/10 text-xs text-gray-400 italic">
                Article published by <span class="font-semibold text-gray-500">{{ $comic->user->name }}</span> on {{ $comic->created_at->format('F j, Y') }}
            </div>
        </div>

    </div>
    <x-back-button/>

    </div>
</x-site-layout>
