<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tags
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">
                            All tags
                            <span class="text-sm text-gray-500 font-normal ml-2">({{ $tags->count() }})</span>
                        </h3>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Comics</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tags as $index => $tag)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ $tag->name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-right">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $tag->comics_count }}
                                        </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-right space-x-2">
                                    <x-edit-button content="tags" link="{{ $tag->id }}"/>
                                    <x-delete-button link="tags/{{ $tag->id }}" content="{{ $tag->name }}"/>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
