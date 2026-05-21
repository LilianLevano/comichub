@props(['user', 'w'=>12, 'h'=>12])

<div class="shrink-0 w-{{$w}} h-{{$h}} rounded-full bg-gray-100 overflow-hidden flex items-center justify-center text-gray-500 font-semibold text-lg">
    @if($user->image_path)
        <img src="{{ asset('storage/' . $user->image_path) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
    @else
        {{ strtoupper(substr($user->name, 0, 1)) }}
    @endif
</div>
