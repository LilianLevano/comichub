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

                    {{-- Name --}}

                    <x-form-fields.text-input
                        name="name"
                        label="Name"
                        placeholder="e.g. John Doe"
                        value="{{old('name', $user->name)}}"
                    />



                    {{-- Email --}}

                    <x-form-fields.text-input
                        name="email"
                        label="Email"
                        placeholder="e.g. hello@example.com"
                        value="{{old('email' , $user->email)}}"
                    />



                    {{-- Password --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="password" class="text-sm font-medium text-gray-700">
                            Password <span class="text-gray-400 font-normal">(Let it empty to not change it)</span>
                        </label>
                        <input type="password" id="password" name="password"
                               class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                               placeholder="••••••••"/>
                        @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Birthday --}}
                    <x-form-fields.date-input
                        name="birthday"
                        label="Birthday"
                        placeholder=""
                        value="{{old('birthday', $user->birthday)}}"
                    />

                    {{-- Bio --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="bio" class="text-sm font-medium text-gray-700">Bio</label>
                        <textarea id="bio" name="bio" rows="4"
                                  class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none">{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="image" class="text-sm font-medium text-gray-700">Profile picture</label>
                        @if($user->image_path)
                            <img src="{{ asset('storage/' . $user->image_path) }}" alt="{{ $user->name }}" class="w-16 h-16 rounded-full object-cover mb-1">
                        @endif
                        <input type="file" id="image" name="image" accept="image/*"
                               class="border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200"/>
                        @error('image')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Is Admin --}}
                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="is_admin" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                        class="w-4 h-4 rounded border-gray-300 text-gray-900 focus:ring-blue-400"/>
                        <label for="is_admin" class="text-sm font-medium text-gray-700">Admin</label>
                    </div>

                    <div class="flex justify-between items-center mt-2">
                        <x-cancel-button/>
                        <x-save-create-button content="Update"/>
                    </div>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
