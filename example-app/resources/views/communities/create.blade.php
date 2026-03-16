<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Создать сообщество</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto">
        <div class="bg-white rounded shadow p-6">
            <form method="POST" action="{{ route('communities.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Название</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Описание</label>
                    <textarea name="description" rows="3" class="w-full border rounded px-3 py-2"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Создать</button>
            </form>
        </div>
    </div>
</x-app-layout>
