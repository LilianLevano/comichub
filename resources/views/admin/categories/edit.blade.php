<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6">
            <form method="POST" action="/admin/categories/{{ $category->id }}">
                @csrf
                @method('PATCH')
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                               class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                        />
                        @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center gap-4">
                            <button onclick="history.back()" type="button" class="text-sm text-gray-400 hover:text-gray-600 transition-colors duration-150">
                                ← Cancel
                            </button>
                            <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-500 hover:bg-blue-600 active:scale-95 text-white text-sm font-medium rounded-lg transition-all duration-150">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
