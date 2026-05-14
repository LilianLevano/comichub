<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comics - Admin') }}
        </h2>
    </x-slot>



    <div class="flex flex-col gap-8 w-[90%] max-w-5xl mx-auto mt-8">
        <x-make-button content="comics"/>
        @foreach($comics as $comic)

            <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex gap-6 group">

                <img src="{{ $comic->image_path }}" alt="{{ $comic->title }}" class="w-64 h-80 object-cover rounded-xl">
                <div class="flex flex-col gap-2 flex-1">
                    <h2 class="text-xl font-bold group-hover:cursor-pointer group-hover:text-blue-400 transition-all duration-300"><a href="/comics/{{$comic->id}}">{{ $comic->title }}</a> </h2>
                    <p class="text-gray-500 text-sm break-words max-w-2xl">{{ $comic->description }}</p>
                    <div class="flex gap-4 text-sm text-gray-400">
                        <span>✍️ {{ $comic->author }}</span>
                        <span> <a href="/categories/{{$comic->category->id}}" class="hover:text-blue-400 underline">📁 {{ $comic->category->name }}</a>  </span>
                        <span>📅 {{ $comic->release_date }}</span>
                    </div>
                    <div class="mt-3 pt-3 border-t border-black/10 text-xs text-gray-400 italic">
                        Article published by <span class="font-semibold text-gray-500">{{ $comic->user->name }}</span> on {{ $comic->created_at->format('F j, Y') }}
                    </div>
                    <x-edit-button content="comics" link="{{$comic->id}}"/>
                </div>

            </div>
        @endforeach
    </div>
</x-app-layout>
