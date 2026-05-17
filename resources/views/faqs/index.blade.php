<x-site-layout>
    <div class="w-[90%] max-w-4xl mx-auto mt-8">
        {{ $faqs->links() }}
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">FAQs</h1>

        <div class="flex flex-col gap-4">
            @forelse ($faqs as $faq)
                <div onclick="window.location='{{ route('faqs.show', $faq->id) }}'"
                     class="cursor-pointer bg-white rounded-2xl shadow-sm border border-black/10 p-5 hover:shadow-md hover:border-black/20 transition">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="text-base font-semibold text-gray-800">{{ $faq->question }}</h2>
                        <span class="text-xs text-gray-400 whitespace-nowrap mt-1">{{ $faq->created_at->diffForHumans() }}</span>
                    </div>

                    <p class="text-sm text-gray-600 mt-2">
                        {{ $faq->answer ? Str::limit($faq->answer, 100) : 'No answer yet.' }}
                    </p>

                    <div class="flex items-center gap-3 mt-4 text-xs text-gray-400">
                        <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-md">{{ $faq->category->name }}</span>
                        <span>Posted by
                            <a href="{{ route('users.show', $faq->user->id) }}"
                               class="font-medium text-gray-600 hover:text-blue-500 transition"
                               onclick="event.stopPropagation()">
                                {{ $faq->user->name }}
                            </a>
                        </span>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500">No FAQs yet.</p>
            @endforelse
        </div>

        {{ $faqs->links('pagination::simple-tailwind') }}
    </div>
</x-site-layout>
