<x-site-layout title="Ask a question">
    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-sm border border-black/10 p-6">
            <h1 class="text-xl font-semibold text-gray-800 mb-6">Ask a question</h1>

            <form method="POST" action="{{ route('faqs.store') }}">
                @csrf

                <div class="flex flex-col gap-4">



                        <x-form-fields.text-area-input
                            name="question"
                            label="Question"
                            placeholder="e.g. Where can I find Batman - Year One?"
                            :value="old('question')"
                        />


                    <x-form-fields.category-select-input
                        name="category_id"
                        label="What is the category of that comics?"
                        :options="$categories"
                        selected="null"
                    />

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
