@props([
    'name',
    'label',
    'placeholder' => '',
    'value' => '',
    'rows' => 3,
])

<div class="flex flex-col">
    <label for="{{ $name }}" class="text-sm font-medium text-gray-700">
        {{ $label }}
    </label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}"
              class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
              placeholder="{{ $placeholder }}">{{ $value }}</textarea>
    @error($name)
    <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror
</div>
