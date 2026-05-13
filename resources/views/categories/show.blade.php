<x-site-layout title="Category - {{$category->name}}">
    <div class="flex flex-col items-center">
        <div class="w-3xl bg-white rounded-2xl shadow-md border border-black/10 p-6">
            <h2 class="text-xl font-bold mb-4">{{ $category->name }}</h2>
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

        <x-back-button/>
    </div>

</x-site-layout>
