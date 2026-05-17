@props([
    'name',
    'label',
    'placeholder',
    'value'


])

<div class="flex flex-col gap-1.5">
    <label for="{{ $name }}" class="text-sm font-medium text-gray-700">{{ $label }}</label>
    <input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
           class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
           placeholder="{{ $placeholder }}"/>
    @error($name)
    <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror
</div>
