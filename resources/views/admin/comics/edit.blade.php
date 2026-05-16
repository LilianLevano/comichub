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
                        <label for="title" class="text-sm font-medium text-gray-700">Title of the comics</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $comic->title) }}"
                               class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                               placeholder="e.g. Batman - Year One"
                        />
                        @error('title')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <label for="description" class="text-sm font-medium text-gray-700">Description of the comics</label>
                        <input type="text" id="description" name="description" value="{{ old('description' , $comic->description) }}"
                               class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                               placeholder="Ex.'Batman - Year one' is a comics that talks about..."
                        />
                        @error('description')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <label for="author" class="text-sm font-medium text-gray-700">Who wrote that comics?</label>
                        <input type="text" id="author" name="author" value="{{ old('author' , $comic->author) }}"
                               class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                               placeholder="e.g. Frank Willer"
                        />
                        @error('author')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <label for="release_date" class="text-sm font-medium text-gray-700">When was that comics released?</label>
                        <input type="date" id="release_date" name="release_date" value="{{ old('release-date', $comic->release_date) }}"
                               class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"

                        />
                        @error('release_date')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

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

                        <label for="image" class="text-sm font-medium text-gray-700">Cover image</label>
                        <input type="file" id="image" name="image" accept="image/*"
                               class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200"
                        />
                        @error('image')
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
                        <x-save-create-button content="Edit"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
