
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Comics') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6">
            <form method="POST" action="/admin/comics/{{$comic->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-1.5">

                        <x-form-fields.text-input
                            name="title"
                            label="Title of the comics"
                            placeholder="e.g. Batman - Year One"
                            value="{{old('title', $comic->title)}}"
                        />

                        <x-form-fields.text-input
                            name="description"
                            label="Description of the comics"
                            placeholder="e.g.'Batman - Year one' is a comics that talks about..."
                            value="{{old('description', $comic->description)}}"
                        />

                        <x-form-fields.text-input
                            name="author"
                            label="Who wrote that comics?"
                            placeholder="e.g. Frank Willer"
                            value="{{old('author',$comic->author)}}"
                        />


                        <x-form-fields.date-input
                            name="release_date"
                            label="When was that comics released?"
                            placeholder=""
                            value="{{old('release_date', $comic->release_date)}}"
                        />


                        <x-form-fields.category-select-input
                            name="category_id"
                            label="What is the category of that comics?"
                            :options="$categories"
                            :selected="$comic->category_id"
                        />



                        <x-form-fields.image-input
                            name="image"
                            label="Cover image (Recommended size: 288x445px)"
                            :current-image="$comic->image_path"
                        />

                        <x-form-fields.tags-select-input
                            name="tags"
                            label="Tags"
                            :options="$tags"
                            :selected="$comic->tags->pluck('id')->toArray()"
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
