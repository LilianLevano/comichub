<li>
    <a class="px-6 py-3 rounded-xl transition-all duration-300 {{ request()->is(ltrim($link, '/') ?: '/') ? 'bg-blue-400 text-white' : 'hover:bg-blue-400 hover:text-white' }}"
       href="{{ $link }}">
        {{ $content }}
    </a>
</li>
