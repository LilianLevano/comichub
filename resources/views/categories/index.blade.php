<x-site-layout title="Categories">
    <div class="w-[90%] max-w-4xl mx-auto mt-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Categories</h1>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @forelse ($categories as $category)
                <a href="/categories/{{ $category->id }}"
                   class="bg-white rounded-2xl shadow-sm border border-black/10 p-5 flex flex-col gap-1 hover:shadow-md hover:border-black/20 transition">
                    <span class="text-base font-semibold text-gray-800">{{ $category->name }}</span>
                    <span class="text-sm text-gray-400">{{ $category->comics_count }} {{ Str::plural('comic', $category->comics_count) }}</span>
                </a>
            @empty
                <p class="text-sm text-gray-500">No categories yet.</p>
            @endforelse
        </div>
    </div>
</x-site-layout>
