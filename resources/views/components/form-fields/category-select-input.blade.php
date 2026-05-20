@props([
    'name',
    'label',
    'options',
    'selected' => null,
    'optionValue' => 'id',
    'optionLabel' => 'name'
])

<div>
    <label for="{{ $name }}" class="text-sm font-medium text-gray-700">
        {{ $label }}
    </label>
    <select name="{{ $name }}" id="{{ $name }}" class="">
        @foreach($options as $option)
            <option value="{{ $option->$optionValue }}" @selected(old($name, $selected) == $option->$optionValue)>
                {{ $option->$optionLabel }}
            </option>
        @endforeach
    </select>
    @error($name)
    <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror
</div>
