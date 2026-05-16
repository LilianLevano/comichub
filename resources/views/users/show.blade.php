<x-site-layout :title="$user->name">


    <div class="w-[90%] max-w-2xl mx-auto mt-10 flex flex-col gap-6">

        {{-- Back --}}


        {{-- Card --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

            {{-- Banner --}}
            <div class="h-28 bg-gradient-to-br from-gray-100 to-gray-200"></div>

            {{-- Avatar + Name --}}
            <div class="px-8 pb-8">
                <div class="-mt-10 mb-4 flex items-end justify-between">
                    <div class="w-20 h-20 rounded-2xl border-4 border-white shadow-md bg-gray-100 overflow-hidden flex items-center justify-center text-gray-500 font-bold text-2xl">
                        @if($user->image_path)
                            <img src="{{ asset($user->image_path) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        @endif
                    </div>
                </div>

                <h1 class="text-2xl font-semibold text-gray-900 flex items-center gap-2">
                    {{ $user->name }}
                    @if($user->is_admin)
                        <span class="text-xs bg-gray-900 text-white rounded-full px-2 py-0.5 font-medium">admin</span>
                    @endif
                </h1>

                @if($user->birthday)
                    <p class="text-sm text-gray-400 flex items-center gap-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($user->birthday)->format('d M Y') }}
                    </p>
                @endif

                @if($user->bio)
                    <div class="mt-6 border-t border-gray-100 pt-6">
                        <p class="text-xs font-medium text-gray-400 uppercase tracking-widest mb-2">Bio</p>
                        <p class="text-gray-700 leading-relaxed">{{ $user->bio }}</p>
                    </div>
                @endif
            </div>

        </div>
        <x-back-button/>
    </div>
</x-site-layout>
