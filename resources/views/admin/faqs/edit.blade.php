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

                        <x-form-fields.text-area-input
                            name="question"
                            label="Question"
                            placeholder="e.g. Where can I find Batman - Year One?"
                            :value="old('question', $faq->question)"
                        />

                        <x-form-fields.text-area-input
                            name="answer"
                            label="Answer"
                            placeholder="Write the answer here..."
                            :value="old('answer', $faq->answer)"
                            rows="5"
                        />

                        <x-form-fields.category-select-input
                            name="category_id"
                            label="What is the category of that comics?"
                            :options="$categories"
                            selected="null"
                        />
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
