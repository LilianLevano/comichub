@props([
    'author',
    'category_id' => null,
    'category_name' => 'No category',
    'user_name',
    'user_id',
    'release_date',
    'created_at'
])

<div class="flex gap-4 text-sm text-gray-400">

    <span>✍️ {{ $author }}</span>

    <span>
        📁

        @if($category_id)
            <a
                href="/categories/{{ $category_id }}"
                class="hover:text-blue-400 underline"
            >
                {{ $category_name }}
            </a>
        @else
            <span>No category</span>
        @endif
    </span>

    <span>📅 {{ $release_date }}</span>

</div>

<div class="mt-3 pt-3 border-t border-black/10 text-xs text-gray-400 italic">
    Article published by
    <span class="font-semibold text-gray-500">
        <a
            class="underline hover:text-blue-400"
            href="/users/{{ $user_id }}"
        >
            {{ $user_name }}
        </a>
    </span>
    on {{ $created_at }}
</div>
