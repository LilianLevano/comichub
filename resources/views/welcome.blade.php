<x-site-layout>

    <div class="flex justify-center max-w-[1500px] mx-auto ">
        <div class="flex flex-col items-center">
            <h1  class="text-2xl font-bold tracking-tight text-gray-800 border-b-4 border-blue-400 pb-2" >Latest Publication</h1>

            <div class="flex flex-col gap-8 w-[90%] max-w-xl mx-auto mt-8">
                    <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex flex-col items-center gap-6">
                        <img src="{{ $comic->image_path }}" alt="{{ $comic->title }}" class="w-32 h-24 object-cover rounded-xl">
                        <div class="flex flex-col gap-2 flex-1">
                            <h2 class="text-xl font-bold">{{ $comic->title }}</h2>
                            <p class="text-gray-500 text-sm">{{ $comic->description }}</p>
                            <div class="flex gap-4 text-sm text-gray-400">
                                <span>✍️ {{ $comic->author }}</span>
                                <span> <a href="/categories/{{$comic->category->id}}" class="hover:text-blue-400 underline">📁 {{ $comic->category->name }}</a>  </span>
                                <span>📅 {{ $comic->release_date }}</span>
                            </div>
                            <div class="mt-3 pt-3 border-t border-black/10 text-xs text-gray-400 italic">
                                Article published by <span class="font-semibold text-gray-500">{{ $comic->user->name }}</span> on {{ $comic->created_at->format('F j, Y') }}
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="flex flex-col items-center">
            <h1  class="text-2xl font-bold tracking-tight text-gray-800 border-b-4 border-blue-400 pb-2">Popular categories</h1>

            <div class="flex flex-col gap-8 w-[90%] max-w-xl mx-auto mt-8">
                
            </div>
        </div>
    </div>

<div class="mb-[100vh]"></div>
</x-site-layout>
