<x-site-layout title="FAQS">
    <div class="w-[90%] max-w-4xl mx-auto mt-8">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">FAQs</h1>

            <x-buttons.create-button-user content="Ask a question" link="/faqs/create"/>

        </div>

        <x-flash-message/>

        @foreach ($faqs as $categoryName => $items)
            <div class="mb-8">
                <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">
                    <a href="{{ route('categories.show', $items->first()->category->id) }}" class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3 hover:text-blue-500 transition">
                        {{ $categoryName }}
                    </a></h2>

                <div class="flex flex-col gap-4">
                    @foreach ($items as $faq)
                        <div onclick="window.location='{{ route('faqs.show', $faq->id) }}'"
                             class="cursor-pointer bg-white rounded-2xl shadow-sm border border-black/10 p-5 hover:shadow-md hover:border-black/20 transition">
                            <div class="flex items-start justify-between gap-4">
                                <h3 class="text-base font-semibold text-gray-800">{{ $faq->question }}</h3>
                                <span class="text-xs text-gray-400 whitespace-nowrap mt-1">{{ $faq->created_at->diffForHumans() }}</span>
                            </div>

                            <p class="text-sm text-gray-600 mt-2">
                                {{ $faq->answer ? Str::limit($faq->answer, 100) : 'No answer yet.' }}
                            </p>

                            <div class="flex items-center gap-3 mt-4 text-xs text-gray-400">
                                <span>Posted by
                                    <a href="{{ route('users.show', $faq->user->id) }}"
                                       class="font-medium text-gray-600 hover:text-blue-500 transition"
                                       onclick="event.stopPropagation()">
                                        {{ $faq->user->name }}
                                    </a>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        @endforeach

    </div>
</x-site-layout>
