<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Tag') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6">
            <form method="POST" action="{{ route('admin.tags.store') }}">
                @csrf

                <x-form-fields.text-input
                    name="name"
                    label="Name of the tag"
                    placeholder="e.g. Comedy"
                    value="{{old('name')}}"
                />

                <div class="flex justify-between items-center mt-2">
                    <x-cancel-button/>
                    <x-save-create-button content="Create"/>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
