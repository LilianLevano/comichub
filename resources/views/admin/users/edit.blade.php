<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-md border border-black/10 p-6">
            <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-4">

                    <x-form-fields.text-input
                        name="name"
                        label="Name"
                        placeholder="e.g. John Doe"
                        value="{{old('name', $user->name)}}"
                    />

                    <x-form-fields.text-input
                        name="email"
                        label="Email"
                        placeholder="e.g. hello@example.com"
                        value="{{old('email' , $user->email)}}"
                    />

                    <x-form-fields.password-input
                        name="password"
                        label="Password"
                        value="{{old('password')}}"
                    />

                    <x-form-fields.date-input
                        name="birthday"
                        label="Birthday"
                        placeholder=""
                        value="{{old('birthday', $user->birthday)}}"
                    />

                    <x-form-fields.text-area-input
                        name="bio"
                        label="Bio"
                        placeholder="I'm a student in..."
                        value="{{ old('bio', $user->bio) }}"
                        rows="4"
                    />

                    <x-form-fields.image-input
                        name="image"
                        label="Profile Picture"
                        accept="image/*"
                        current-image="{{$user->image_path}}"
                    />


                    <x-form-fields.admin-checkbox
                        name="is_admin"
                        label="Admin"
                        value="{{ old('is_admin', $user->is_admin) ? 'checked' : '' }}"
                    />

                    <div class="flex justify-between items-center mt-2">
                        <x-buttons.cancel-button/>
                        <x-buttons.save-create-button content="Update"/>
                    </div>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
