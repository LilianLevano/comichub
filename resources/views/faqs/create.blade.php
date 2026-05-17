<x-site-layout title="Ask a question">
    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-sm border border-black/10 p-6">
            <h1 class="text-xl font-semibold text-gray-800 mb-6">Ask a question</h1>

            <form method="POST" action="{{ route('faqs.store') }}">
                @csrf

                <div class="flex flex-col gap-4">
                    <div>
                        <label for="question" class="text-sm font-medium text-gray-700">Your question</label>
                        <textarea
                            id="question"
                            name="question"
                            rows="4"
                            placeholder="e.g. Where can I find Batman - Year One?"
                            class="mt-1 w-full border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
                        >{{ old('question') }}</textarea>
                        @error('question')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="text-sm font-medium text-gray-700">Category</label>
                        <select id="category_id" name="category_id"
                                class="mt-1 w-full border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mt-2">
                        <a href="{{ route('faqs.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition">Cancel</a>
                        <button type="submit" class="bg-gray-800 text-white text-sm px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                            Post question
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-site-layout>
