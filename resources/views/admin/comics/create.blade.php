<x-app-layout title="Make a comic - Admin">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Comics') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6">
            <form method="POST" action="/admin/comics" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-1.5">
                    <x-form-fields.text-input
                        name="title"
                        label="Title of the comics"
                        placeholder="e.g. Batman - Year One"
                        value="{{old('title')}}"
                    />

                        <x-form-fields.text-input
                            name="description"
                            label="Description of the comics"
                            placeholder="e.g.'Batman - Year one' is a comics that talks about..."
                            value="{{old('description')}}"
                        />

                        <x-form-fields.text-input
                            name="author"
                            label="Who wrote that comics?"
                            placeholder="e.g. Frank Willer"
                            value="{{old('author')}}"
                        />

                        <x-form-fields.date-input
                            name="release_date"
                            label="When was that comics released?"
                            placeholder=""
                            value="{{old('release_date')}}"
                        />

                        <x-form-fields.category-select-input
                            name="category_id"
                            label="What is the category of that comics?"
                            :options="$categories"
                            selected="null"
                        />

                        <x-form-fields.image-input
                            name="image"
                            label="Cover image (Recommended size: 288x445px)"
                            :current-image="null"
                        />



                        <x-form-fields.tags-select-input
                            name="tags"
                            label="Tags"
                            :options="$tags"
                        />



                    </div>

                    <div class="flex justify-between items-center mt-2">
                        <x-buttons.cancel-button/>
                        <x-buttons.save-create-button content="Create"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
