<x-site-layout title="Comics" header="Comics">
    <div class="flex flex-col gap-8 w-[90%] max-w-5xl mx-auto mt-8">
        @foreach($comics as $comic)
            <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex gap-6">
                <img src="{{ $comic->image_path }}" alt="{{ $comic->title }}" class="w-32 h-24 object-cover rounded-xl">
                <div class="flex flex-col gap-2 flex-1">
                    <h2 class="text-xl font-bold">{{ $comic->title }}</h2>
                    <p class="text-gray-500 text-sm">{{ $comic->description }}</p>
                    <div class="flex gap-4 text-sm text-gray-400">
                        <span>✍️ {{ $comic->author }}</span>
                        <span>📁 {{ $comic->category->name }}</span>
                        <span>📅 {{ $comic->release_date }}</span>
                    </div>
                    <div class="mt-3 pt-3 border-t border-black/10 text-xs text-gray-400 italic">
                        Article published by <span class="font-semibold text-gray-500">{{ $comic->user->name }}</span> on {{ $comic->created_at->format('F j, Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-site-layout>
