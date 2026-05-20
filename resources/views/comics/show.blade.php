<x-site-layout title="Category - {{$comic->title}}">
    <div class="flex flex-col items-center gap-6 w-[90%] max-w-3xl mx-auto mt-10">

        <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex gap-6 w-full">
            <x-comic-image :path="$comic->image_path" :title="$comic->title"/>
            <div class="flex flex-col gap-2 flex-1">
                <h2 class="text-xl font-bold">{{ $comic->title }}</h2>
                <p class="text-gray-500 text-sm">{{ $comic->description }}</p>
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

        {{-- Commentaires --}}
        <div class="w-full flex flex-col gap-4">


            <x-show-likes-comic :comic="$comic" />

            @auth
                <form method="POST" action="/comics/{{ $comic->id }}/comments" class="flex flex-col gap-2">
                    @csrf
                    <textarea name="body" rows="3" placeholder="Leave a comment..."
                              class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none w-full">{{ old('body') }}</textarea>
                    @error('body')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="self-end bg-gray-900 text-white text-sm px-4 py-2 rounded-xl hover:bg-gray-700 transition">
                        Post
                    </button>
                </form>
            @endauth

            @foreach($comic->comments()->with('user')->latest()->get() as $comment)
                <div class="bg-white border border-gray-100 rounded-xl p-4 flex gap-3">
                    <div class="w-8 h-8 rounded-full bg-gray-100 overflow-hidden flex items-center justify-center text-sm font-semibold text-gray-500 shrink-0">
                        @if($comment->user->image_path)
                            <img src="{{ asset('storage/' . $comment->user->image_path) }}" alt="{{ $comment->user->name }}" class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                        @endif
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ $comment->user->name }}</p>
                        <p class="text-sm text-gray-500 mt-0.5">{{ $comment->body }}</p>
                        <p class="text-xs text-gray-300 mt-1">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach

        </div>

        <x-back-button/>

    </div>
</x-site-layout>
