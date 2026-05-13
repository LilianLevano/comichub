@php

    $menu_items = [
        ['name'=>'Home', 'url'=>'/'],
        ['name'=>'Categories', 'url'=>'/categories'],
        ['name'=>'Comics', 'url'=>'/comics']
]

@endphp


<header class="flex flex-col items-center mt-8">
    <nav class="w-[90%] max-w-5xl backdrop-blur-md shadow-xl rounded-3xl border border-black/10 px-10 py-5">
        <ul class="flex justify-between items-center text-lg">
            <div class="flex gap-8">
                @foreach($menu_items as $item)
                    <x-nav-bar-element link="{{$item['url']}}" content="{{$item['name']}}"/>
                @endforeach
            </div>

            <span class="font-semibold">ComicHub</span>

            @auth
                <div class="flex items-center gap-3">
                    <span class="text-m font-medium text-gray-700 border-b border-black/50 hover:border-black hover:text-gray-950"> <a href="/dashboard">{{ auth()->user()->name }}</a> </span>
                </div>
            @else
                <div class="flex items-center gap-4 text-sm font-medium">
                    <a href="/login" class="text-gray-600 hover:text-blue-500 transition-colors duration-150">Login</a>
                    <a href="/register" class="px-4 py-1.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-150">Register</a>
                </div>
            @endauth
        </ul>
    </nav>
</header>
