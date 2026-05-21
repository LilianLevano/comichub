<x-app-layout title="Users - Admin">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users - Admin') }}
        </h2>
    </x-slot>

    <div class="w-[90%] max-w-5xl mx-auto mt-8 flex flex-col gap-6">

        <div class="flex items-baseline justify-between">
            <div class="flex items-baseline gap-3">
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900">Users</h1>
                <span class="text-sm text-gray-400">{{ $users->total() }} users</span>
            </div>
            <x-buttons.make-button content="users"/>
        </div>

        {{ $users->links() }}
        <x-flash-message/>
        <div class="flex flex-col gap-3">
            @foreach($users as $user)
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm flex gap-4 items-center">

                    {{-- Avatar --}}

                    <x-user.show-avatar-user :user="$user"/>

                    {{-- Info principale --}}
                    <div class="flex flex-col gap-0.5 flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <p class="font-semibold text-gray-900 truncate">{{ $user->name }}</p>
                            @if($user->is_admin)
                                <span class="text-xs bg-gray-900 text-white rounded-full px-2 py-0.5 font-medium">admin</span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-400 truncate">{{ $user->email }}</p>
                        @if($user->bio)
                            <p class="text-sm text-gray-500 mt-1">{{ $user->bio }}</p>
                        @endif
                    </div>

                    {{-- Méta --}}
                    <div class="hidden md:flex flex-col gap-0.5 text-xs text-gray-400 text-right shrink-0">
                        @if($user->birthday)
                            <p>{{ \Carbon\Carbon::parse($user->birthday)->format('d M Y') }}</p>
                        @endif
                        @if($user->email_verified_at)
                            <p class="text-green-400">✓ Verified</p>
                        @else
                            <p class="text-red-300">✗ Not verified</p>
                        @endif
                        <p>Joined {{ $user->created_at->format('d M Y') }}</p>
                    </div>
                    <x-buttons.edit-button content="users" link="{{$user->id}}"/>
                    <x-buttons.delete-button link="users/{{$user->id}}" content="{{$user->name}}"/>
                </div>

            @endforeach


        </div>

        <div class="mt-2">
            {{ $users->links('pagination::simple-tailwind') }}
        </div>

    </div>
</x-app-layout>
