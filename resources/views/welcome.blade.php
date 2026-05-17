<x-site-layout>

    <div class="flex justify-center max-w-[1500px] mx-auto ">
        <div class="flex flex-col items-center">
            <h1  class="text-2xl font-bold tracking-tight text-gray-800 border-b-4 border-blue-400 pb-2" >Latest Publication</h1>

            <div class="flex flex-col gap-8 w-[90%] max-w-xl mx-auto mt-8">
                    <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex flex-col items-center gap-6 group ">
                        <x-comic-image path="{{$comic->image_path}}" title="{{$comic->title}}"/>
                        <div class="flex flex-col gap-2 flex-1 max-w-4xl px-4">
                            <h2 class="text-xl font-bold group-hover:cursor-pointer group-hover:text-blue-400 transition-all duration-300  "><a href="/comics/{{$comic->id}}">{{ $comic->title }}</a> </h2>
                            <p class="text-gray-500 text-sm max-w-xs truncate ">{{ $comic->description }}</p>
                            <x-comic-extra-information
                                author="{{ $comic->author }}"
                                category_id="{{$comic->category->id}}"
                                category_name="{{ $comic->category->name }}"
                                release_date="{{ $comic->release_date }}"
                                user_name="{{ $comic->user->name }}"
                                user_id="{{$comic->user->id}}"
                                created_at="{{ $comic->created_at->format('F j, Y') }}"
                            />
                        </div>
                    </div>
            </div>
        </div>

        <div class="flex flex-col items-center">
            <h1  class="text-2xl font-bold tracking-tight text-gray-800 border-b-4 border-blue-400 pb-2">Popular categories</h1>

            <div class="flex flex-col gap-8 w-[100%]  mx-auto mt-8  h-[100%]">
                <ol class="bg-white rounded-2xl shadow-md border border-black/10 p-6 flex flex-col gap-4 h-full">
                    @foreach($topCategories as $category)

                        <li class="w-full">
                            <a href="/categories/{{$category->id}}" class="flex items-center justify-between bg-gray-50 hover:bg-blue-50 border border-black/5 rounded-xl px-4 py-3 transition-all duration-300 hover:scale-[1.02] hover:shadow-md group">
                                <span class="font-semibold text-gray-800 group-hover:text-blue-500 pr-4">{{$teller}}. {{$category->name}}</span>
                                <span class="text-sm bg-blue-100 text-blue-600 px-3 py-1 rounded-full font-medium">{{$category->comics_count}} comics</span>
                            </a>
                        </li>

                        @php
                            $teller++;
                        @endphp

                    @endforeach
                </ol>

            </div>
        </div>
    </div>
</x-site-layout>
