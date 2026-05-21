@props([
    'content'=>'default',
    'link'=>'default'
])

<a href="/admin/{{$content}}/{{ $link }}/edit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm w-fit font-medium text-gray-600 hover:text-blue-500 border border-black/10 hover:border-blue-400 rounded-lg transition-all duration-150">
    ✎ Edit
</a>
