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
            <div class="flex gap-8 ">

                @foreach($menu_items as $item)
                    <x-nav-bar-element link="{{$item['url']}}" content="{{$item['name']}}"/>
                @endforeach

            </div>

            <span>ComicHub</span>

        </ul>
    </nav>
</header>
