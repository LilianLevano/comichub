<x-site-layout>
    <div class="w-[90%] max-w-3xl mx-auto mt-8 flex flex-col gap-6">

        {{-- Question card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-black/10 p-6">
            <div class="flex items-start justify-between gap-4">
                <h1 class="text-xl font-semibold text-gray-800">{{ $faq->question }}</h1>
                <span class="text-xs text-gray-400 whitespace-nowrap mt-1">{{ $faq->created_at->diffForHumans() }}</span>
            </div>

            <p class="text-sm text-gray-600 mt-4">{{ $faq->answer ?? 'No answer yet.' }}</p>

            <div class="flex items-center gap-3 mt-6 text-xs text-gray-400">
                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-md">{{ $faq->category->name }}</span>
                <span>Asked by
                    <a href="{{ route('users.show', $faq->user->id) }}" class="font-medium text-gray-600 hover:text-blue-500 transition">
                        {{ $faq->user->name }}
                    </a>
                </span>
            </div>

        </div>
        <x-buttons.back-button/>
    </div>
</x-site-layout>
