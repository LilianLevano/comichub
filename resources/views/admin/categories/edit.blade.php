<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6">
            <form method="POST" action="/admin/categories/{{ $category->id }}">
                @csrf
                @method('PATCH')
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-1.5">

                        <x-form-fields.text-input
                            name="name"
                            label="Name"
                            value="{{old('name', $category->name)}}"
                        />

                    </div>

                    <div class="flex justify-between items-center mt-2">

                        <div class="flex items-center gap-4">
                            <x-cancel-button/>
                            <x-save-create-button content="Update"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
