<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">Сообщества</h2>
            <a href="{{ route('communities.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Создать</a>
        </div>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        @foreach($communities as $community)
            <div class="bg-white rounded shadow p-4 mb-4">
                <a href="{{ route('communities.show', $community) }}" class="text-xl font-bold text-blue-600">
                    r/{{ $community->name }}
                </a>
                <p class="text-gray-500 text-sm mt-1">{{ $community->description }}</p>
                <p class="text-gray-400 text-xs mt-1">{{ $community->posts_count }} постов</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
