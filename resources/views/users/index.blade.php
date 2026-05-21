<x-site-layout title="Users">
    <div class="w-[90%] max-w-5xl mx-auto mt-10 flex flex-col gap-6">
        {{ $users->links() }}
        <div class="flex items-baseline gap-3 mb-2">
            <h1 class="text-3xl font-semibold tracking-tight text-gray-900">Members</h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($users as $user)
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow duration-200 flex gap-4 items-start">

                    {{-- Avatar --}}
                    <x-user.show-avatar-user :user="$user"/>

                    {{-- Info --}}
                    <div class="flex flex-col gap-1 min-w-0">
                        <p class="font-semibold text-gray-900 truncate">
                            <a class="hover:text-blue-400" href="/users/{{$user->id}}">{{ $user->name }}</a>
                            @if($user->is_admin)
                                <span class="ml-1 text-xs bg-gray-900 text-white rounded-full px-2 py-0.5 font-medium">admin</span>
                            @endif
                        </p>

                        @if($user->birthday)
                            <p class="text-xs text-gray-400 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($user->birthday)->format('d M Y') }}
                            </p>
                        @endif

                        @if($user->bio)
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $user->bio }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $users->links('pagination::simple-tailwind') }}
        </div>

    </div>
</x-site-layout>
