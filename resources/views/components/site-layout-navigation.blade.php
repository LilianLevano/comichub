@php

    $menu_items = [
        ['name'=>'Home', 'url'=>'/'],
        ['name'=>'Categories', 'url'=>'/categories'],
        ['name'=>'Comics', 'url'=>'/comics'],
        ['name'=>'Users', 'url'=>'/users'],
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
                    @if(auth()->user()->is_admin)
                        {{-- Admin : lien vers le dashboard --}}
                        <span class="text-m font-medium text-gray-700 border-b border-black/50 hover:border-black hover:text-gray-950">
            <a href="/dashboard">{{ auth()->user()->name }}</a>
        </span>
                    @else
                        {{-- User simple : dropdown --}}
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="text-m font-medium text-gray-700 border-b border-black/50 hover:border-black hover:text-gray-950">
                                {{ auth()->user()->name }}
                            </button>

                            <div x-show="open" @click.outside="open = false" x-transition
                                 class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-gray-100 py-1 z-50">
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    Profile
                                </a>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                        Log out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
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
