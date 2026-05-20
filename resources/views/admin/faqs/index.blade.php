<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQS - Admin') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-4xl mx-auto mt-8">
        {{ $faqs->links() }}
        <x-flash-message/>
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">FAQs</h1>
        <x-make-button content="faqs"/>
        <div class="flex flex-col gap-4 mt-4">
            @foreach ($faqs as $faq)
                <div onclick="window.location='{{ route('faqs.show', $faq->id) }}'"
                     class="cursor-pointer bg-white rounded-2xl shadow-sm border border-black/10 p-5 hover:shadow-md hover:border-black/20 transition">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="text-base font-semibold text-gray-800">{{ $faq->question }}</h2>
                        <span class="text-xs text-gray-400 whitespace-nowrap mt-1">{{ $faq->created_at->diffForHumans() }}</span>
                    </div>

                    <p class="text-sm text-gray-600 mt-2">
                        {{ $faq->answer ? : 'No answer yet.' }}
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
                    <div class="flex gap-5 mt-5">
                        <x-edit-button content="faqs" link="{{$faq->id}}"/>
                        <x-delete-button link="faqs/{{$faq->id}}" content="{{$faq->question}}"/>
                    </div>

                </div>

            @endforeach
        </div>

        {{ $faqs->links('pagination::simple-tailwind') }}

    </div>
</x-app-layout>
