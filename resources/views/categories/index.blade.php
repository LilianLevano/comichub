<x-site-layout title="Categories" header="Categories">
    <div class="flex flex-col gap-8 w-[90%] max-w-5xl mx-auto mt-8">
        {{ $categories->links() }}
        @foreach($categories as $category)
            <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6  group">
                <h2 class="text-xl font-bold mb-4 group-hover:text-blue-400 transition-all duration-300"><a href="/categories/{{$category->id}}">{{ $category->name }}</a> </h2>
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
        {{ $categories->links('pagination::simple-tailwind') }}
    </div>


</x-site-layout>

