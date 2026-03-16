<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Создать пост в r/{{ $community->name }}</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto">
        <div class="bg-white rounded shadow p-6">
            <form method="POST" action="{{ route('posts.store', $community) }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Заголовок</label>
                    <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Текст (необязательно)</label>
                    <textarea name="body" rows="5" class="w-full border rounded px-3 py-2"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Опубликовать</button>
            </form>
        </div>
    </div>
</x-app-layout>
