@props([
    'name',
    'label',
    'accept' => 'image/*',
    'currentImage' => null,
])

<div>
    <label for="{{ $name }}" class="text-sm font-medium text-gray-700">
        {{ $label }}
    </label>

    @if($currentImage != null)
        <img src="{{ Storage::url($currentImage) }}" alt="Current cover"
             class="w-32 h-44 object-cover rounded-lg border border-black/10" />
    @endif

    <input type="file" id="{{ $name }}" name="{{ $name }}" accept="{{ $accept }}"
           class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200"
    />
    @error($name)
    <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror
</div>
