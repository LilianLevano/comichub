<x-site-layout title="Tags">
    <div class="w-[90%] max-w-4xl mx-auto mt-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tags</h1>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @forelse ($tags as $tag)
                <a href="{{ route('tags.show', $tag->id) }}"
                   class="bg-white rounded-2xl shadow-sm border border-black/10 p-5 flex flex-col gap-1 hover:shadow-md hover:border-black/20 transition">
                    <span class="text-base font-semibold text-gray-800">{{ $tag->name }}</span>
                    <span class="text-sm text-gray-400">{{ $tag->comics_count }} {{ Str::plural('comic', $tag->comics_count) }}</span>
                </a>
            @empty
                <p class="text-sm text-gray-500">No tags yet.</p>
            @endforelse
        </div>
    </div>
</x-site-layout>
