<x-site-layout title="Category - {{$comic->title}}">
    <div class="flex flex-col items-center">


    <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex gap-6">
       <x-comic-image path="{{$comic->image_path}}" title="{{$comic->title}}"/>
        <div class="flex flex-col gap-2 flex-1">
            <h2 class="text-xl font-bold">{{ $comic->title }}</h2>
            <p class="text-gray-500 text-sm">{{ $comic->description }}</p>
        <x-comic-extra-information
            author="{{ $comic->author }}"
            category_id="{{$comic->category->id}}"
            category_name="{{ $comic->category->name }}"
            release_date="{{ $comic->release_date }}"
            user_name="{{ $comic->user->name }}"
            created_at="{{ $comic->created_at->format('F j, Y') }}"
        />
        </div>

    </div>
    <x-back-button/>

    </div>
</x-site-layout>
