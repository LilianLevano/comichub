@php
    $menu_items = [
        ['name'=>'Home', 'url'=>'/'],
        ['name'=>'Comics', 'url'=>'/comics'],
        ['name'=>'Categories', 'url'=>'/categories'],
        ['name'=>'Tags', 'url'=>'/tags'],
        ['name'=>'Faqs', 'url'=>'/faqs'],
        ['name'=>'Users', 'url'=>'/users'],

    ]
@endphp

<header class="flex flex-col items-center mt-8">
    <nav class="w-[90%] max-w-6xl backdrop-blur-md shadow-xl rounded-3xl border border-black/10 px-6 py-4"
         x-data="{ mobileOpen: false }">

        {{-- Desktop + mobile top bar --}}
        <div class="flex justify-between items-center">

            <span class="font-semibold text-lg">ComicHub</span>

            {{-- Desktop menu --}}
            <ul class="hidden lg:flex gap-6 text-base items-center">
                @foreach($menu_items as $item)
                    <x-nav-bar-element link="{{$item['url']}}" content="{{$item['name']}}"/>
                @endforeach
            </ul>

            {{-- Desktop auth --}}
            <div class="hidden lg:flex items-center gap-4">
                @auth
                    @if(auth()->user()->is_admin)
                        <span class="text-sm font-medium text-gray-700 border-b border-black/50 hover:border-black hover:text-gray-950">
                            <a href="/dashboard">{{ auth()->user()->name }}</a>
                        </span>
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="text-sm font-medium text-gray-700 border-b border-black/50 hover:border-black hover:text-gray-950">
                                {{ auth()->user()->name }}
                            </button>
                            <div x-show="open" @click.outside="open = false" x-transition
                                 class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-gray-100 py-1 z-50">
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile Settings</a>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Log out</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @else
                    <a href="/login" class="text-sm text-gray-600 hover:text-blue-500 transition-colors duration-150">Login</a>
                    <a href="/register" class="px-4 py-1.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm transition-colors duration-150">Register</a>
                @endauth
            </div>

            {{-- Hamburger button --}}
            <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-gray-700 focus:outline-none">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div x-show="mobileOpen" x-transition class="lg:hidden mt-4 flex flex-col gap-2 border-t border-black/10 pt-4">
            @foreach($menu_items as $item)
                <a href="{{ $item['url'] }}" class="text-sm text-gray-700 hover:text-blue-500 py-1">{{ $item['name'] }}</a>
            @endforeach

            <div class="border-t border-black/10 pt-3 mt-2 flex flex-col gap-2">
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="/dashboard" class="text-sm font-medium text-gray-700">{{ auth()->user()->name }} (Admin)</a>
                    @else
                        <a href="/profile" class="text-sm text-gray-700 hover:text-blue-500">Profile Settings</a>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="text-sm text-gray-700 hover:text-red-500">Log out</button>
                        </form>
                    @endif
                @else
                    <a href="/login" class="text-sm text-gray-600 hover:text-blue-500">Login</a>
                    <a href="/register" class="text-sm text-white bg-blue-500 hover:bg-blue-600 px-4 py-1.5 rounded-lg text-center">Register</a>
                @endauth
            </div>
        </div>

    </nav>
</header>
