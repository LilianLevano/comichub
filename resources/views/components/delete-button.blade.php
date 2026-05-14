@props([
    'content'=>'default',
    'link'=>'default',
    'confirm'=>false
])

<form method="POST" action="/admin/{{$link}}">
    @csrf
    @method('DELETE')
    <button type="submit"
            onclick=" @if($confirm) return confirm('Delete {{ $content }}? Deleting a category will destroy every comics that has that category') @else return confirm('Delete {{ $content }}? @endif "
            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-red-400 hover:text-red-600 border border-black/10 hover:border-red-300 rounded-lg transition-all duration-150">
        ✕ Delete
    </button>
</form>
