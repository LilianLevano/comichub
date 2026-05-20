<x-site-layout title="Comics" header="Comics">
    <div class="flex flex-col gap-8 w-[90%] max-w-5xl mx-auto mt-8">
        {{ $comics->links() }}
        <x-flash-message/>
        <x-create-button-user content="Post a comic!" link="/comics/create"/>
        @foreach($comics as $comic)
            <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex gap-6 group">
                <x-comic-image :path="$comic->image_path" :title="$comic->title"/>
                <div class="flex flex-col gap-2 flex-1">
                    <h2 class="text-xl font-bold group-hover:cursor-pointer group-hover:text-blue-400 transition-all duration-300"><a href="/comics/{{$comic->id}}">{{ $comic->title }}</a> </h2>

                    <x-comic-extra-information
                        author="{{ $comic->author }}"
                        :category_id="$comic->category?->id"
                        :category_name="$comic->category?->name"
                        release_date="{{ $comic->release_date }}"
                        user_name="{{ $comic->user->name }}"
                        user_id="{{ $comic->user->id }}"
                        created_at="{{ $comic->created_at->format('F j, Y') }}"
                    />

                    <x-comic-tags :tags="$comic->tags" />
                </div>
            </div>
        @endforeach

        {{ $comics->links('pagination::simple-tailwind') }}
    </div>
</x-site-layout>
