<x-site-layout :title="$category->name">
    <div class="w-[90%] max-w-7xl mx-auto mt-8">

        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">{{ $category->name }}</h1>
            <p class="text-sm text-gray-400 mt-1">{{ $category->comics->count() }} {{ Str::plural('comic', $category->comics->count()) }}</p>
        </div>

        <div class="flex w-[100%] gap-10 flex-wrap">
            @forelse ($category->comics as $comic)
                <a href="{{ route('comics.show', $comic->id) }}" class="flex flex-col gap-2 group w-[288px]">
                    <x-comic-image path="{{ $comic->image_path }}" title="{{ $comic->title }}" />
                    <span class="text-sm font-medium text-gray-800 group-hover:text-blue-500 transition">{{ $comic->title }}</span>
                    <span class="text-xs text-gray-400">{{ $comic->category->name }}</span>
                </a>
            @empty
                <p class="text-sm text-gray-500 col-span-full">No comics in this category yet.</p>
            @endforelse
        </div>
        <x-back-button/>
    </div>
</x-site-layout>
