@props([
    'author',
    'category_id',
    'category_name',
    'user_name',
    'release_date',
    'user_name',
    'created_at'


    ]
)

<div class="flex gap-4 text-sm text-gray-400">
    <span>✍️ {{ $author }}</span>
    <span> <a href="/categories/{{$category_id}}" class="hover:text-blue-400 underline">📁 {{ $category_name }}</a>  </span>
    <span>📅 {{ $release_date }}</span>
</div>
<div class="mt-3 pt-3 border-t border-black/10 text-xs text-gray-400 italic">
    Article published by <span class="font-semibold text-gray-500">{{ $user_name }}</span> on {{ $created_at }}
</div>
