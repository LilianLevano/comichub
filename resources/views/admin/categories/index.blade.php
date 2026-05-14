<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories - Admin') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-8 w-[90%] max-w-5xl mx-auto mt-8">

      <x-make-button content="categories"/>

        @foreach($categories as $category)
            <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 group">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold group-hover:text-blue-400 transition-all duration-300">
                        <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                    </h2>
                    <div class="flex items-center gap-2">
                        <a href="/admin/categories/{{ $category->id }}/edit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-gray-600 hover:text-blue-500 border border-black/10 hover:border-blue-400 rounded-lg transition-all duration-150">
                            ✎ Edit
                        </a>
                        <form method="POST" action="/admin/categories/{{ $category->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Delete {{ $category->name }}? Deleting a category will destroy every comics that has that category')"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-red-400 hover:text-red-600 border border-black/10 hover:border-red-300 rounded-lg transition-all duration-150">
                                ✕ Delete
                            </button>
                        </form>
                    </div>
                </div>
                <ul class="flex flex-wrap gap-10">
                    @foreach($category->comics as $comic)
                        <li>
                            <a href="/comics/{{ $comic->id }}" class="px-4 py-2 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-400 hover:text-white transition-all duration-300">
                                {{ $comic->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

</x-app-layout>
