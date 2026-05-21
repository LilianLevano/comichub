@props([
    'name',
    'label',
    'value',
])

<div class="flex items-center gap-3">
    <input type="checkbox" id="{{$name}}" name="{{$name}}" value="1" {{ $value }} class="w-4 h-4 rounded border-gray-300 text-gray-900 focus:ring-blue-400"/>
    <label for="is_admin" class="text-sm font-medium text-gray-700">{{$label}}</label>
    @error($name)
    <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror
</div>
