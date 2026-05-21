<x-app-layout title="Edit a tag - Admin">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tag') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6">
            <form method="POST" action="{{ route('admin.tags.update', $tag->id) }}">
                @csrf
                @method('PATCH')

                <x-form-fields.text-input
                    name="name"
                    label="Name of the tag (Max. 30 characters)"
                    placeholder="e.g. Comedy"
                    value="{{old('name', $tag->name)}}"
                />

                <div class="flex justify-between items-center mt-2">
                    <x-buttons.cancel-button/>
                    <x-buttons.save-create-button content="Update"/>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
