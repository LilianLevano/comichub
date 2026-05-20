@if(session('success'))
    <div class="bg-green-100 text-green-800 text-sm px-4 py-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif
