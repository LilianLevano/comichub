<x-site-layout title="Contact">
    @if(session('success'))
        <div class="bg-green-100 text-green-800 text-sm px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-[90%] max-w-lg mx-auto mt-8">
        <div class="bg-white rounded-2xl shadow-sm border border-black/10 p-6">
            <h1 class="text-xl font-semibold text-gray-800 mb-6">Contact the admin!</h1>

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="flex flex-col gap-4">
                    <div>
                        <label for="question" class="text-sm font-medium text-gray-700">What do you want to ask the admin?</label>
                        <textarea
                            id="question"
                            name="question"
                            rows="4"
                            placeholder="e.g. There is a bug..."
                            class="mt-1 w-full border border-black/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
                        >{{ old('question') }}</textarea>
                        @error('question')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="flex justify-end items-center mt-2">

                        <button type="submit" class="bg-gray-800 text-white text-sm px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                            Ask!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-site-layout>
