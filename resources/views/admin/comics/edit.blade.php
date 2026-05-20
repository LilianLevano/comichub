
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

                        <label for="category_id" class="text-sm font-medium text-gray-700">What is the category of that comics?</label>
                        <select name="category_id" id="category_id" class="">

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $comic->category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror



                        <label for="image" class="text-sm font-medium text-gray-700">Current cover image (Let it empty to not change it)</label>

                        @if ($comic->image_path)
                            <img src="{{ Storage::url($comic->image_path) }}" alt="Current cover" class="w-32 h-44 object-cover rounded-lg border border-black/10" />
                        @endif

                        <input type="file" id="image" name="image" accept="image/*"
                               class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200"
                        />
                        @error('image')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <label for="tags" class="text-sm font-medium text-gray-700">Tags</label>
                        <select name="tags[]" id="tags" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags', $comic->tags->pluck('id')->toArray())))>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('tags')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <script>
                            new TomSelect('#category_id', {
                                placeholder: 'Search for a category...',
                                maxOptions: 50,
                            });

                            new TomSelect('#tags', {
                                plugins: ['remove_button'],
                                placeholder: 'Select tags...',
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
