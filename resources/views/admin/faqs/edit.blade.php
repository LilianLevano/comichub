<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit FAQ') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6">
            <form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
                @csrf
                @method('PATCH')
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-1.5">

                        <label for="question" class="text-sm font-medium text-gray-700">Question</label>
                        <textarea id="question" name="question" rows="3"
                                  class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
                                  placeholder="e.g. Where can I find Batman - Year One?">{{ old('question', $faq->question) }}</textarea>
                        @error('question')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <label for="answer" class="text-sm font-medium text-gray-700">Answer</label>
                        <textarea id="answer" name="answer" rows="5"
                                  class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
                                  placeholder="Write the answer here...">{{ old('answer', $faq->answer) }}</textarea>
                        @error('answer')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <label for="category_id" class="text-sm font-medium text-gray-700">Category</label>
                        <select name="category_id" id="category_id">
                            <option value="">-- Choose a category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $faq->category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <script>
                            new TomSelect('#category_id', {
                                placeholder: 'Search for a category...',
                                maxOptions: 50,
                            });
                        </script>

                    </div>

                    <div class="flex justify-between items-center mt-2">
                        <x-cancel-button/>
                        <x-save-create-button content="Update"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
