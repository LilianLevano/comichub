@props([
    'name',
    'label',
    'placeholder'=>"",
    'value'=>'',
])


<label for="{{$name}}" class="text-sm font-medium text-gray-700">{{$label}}</label>
<input type="date" id="{{$name}}" name="{{$name}}" value="{{ old($name, $value) }}"
       class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"

/>
@error($name)
<span class="text-red-500 text-xs">{{ $message }}</span>
@enderror
