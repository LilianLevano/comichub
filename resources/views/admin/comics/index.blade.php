<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comics - Admin') }}
        </h2>
    </x-slot>



    <div class="flex flex-col gap-8 w-[90%] max-w-5xl mx-auto mt-8">
        {{ $comics->links() }}
        <x-make-button content="comics"/>
        @foreach($comics as $comic)

            <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex gap-6 group">

                <x-comic-image path="{{$comic->image_path}}" title="{{$comic->title}}"/>
                <div class="flex flex-col gap-2 flex-1">
                    <h2 class="text-xl font-bold group-hover:cursor-pointer group-hover:text-blue-400 transition-all duration-300"><a href="/comics/{{$comic->id}}">{{ $comic->title }}</a> </h2>
                    <p class="text-gray-500 text-sm break-words max-w-2xl">{{ $comic->description }}</p>
                    <x-comic-extra-information
                        author="{{ $comic->author }}"
                        category_id="{{$comic->category->id}}"
                        category_name="{{ $comic->category->name }}"
                        release_date="{{ $comic->release_date }}"
                        user_id="{{$comic->user->id}}"
                        user_name="{{ $comic->user->name }}"
                        created_at="{{ $comic->created_at->format('F j, Y') }}"
                    />
                    <x-comic-tags :tags="$comic->tags" />

                    <x-edit-button content="comics" link="{{$comic->id}}"/>
                    <x-delete-button link="comics/{{$comic->id}}" content="{{$comic->title}}"/>
                </div>

            </div>
        @endforeach
        {{ $comics->links('pagination::simple-tailwind') }}
    </div>
</x-app-layout>
