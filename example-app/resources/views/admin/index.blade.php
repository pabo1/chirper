<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 px-4">
        <h1 class="text-2xl font-bold mb-6">Админ панель</h1>

        <div class="grid grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded shadow p-6 text-center">
                <div class="text-3xl font-bold text-orange-500">{{ $stats['users'] }}</div>
                <div class="text-gray-500 mt-1">Пользователей</div>
            </div>
            <div class="bg-white rounded shadow p-6 text-center">
                <div class="text-3xl font-bold text-orange-500">{{ $stats['posts'] }}</div>
                <div class="text-gray-500 mt-1">Постов</div>
            </div>
            <div class="bg-white rounded shadow p-6 text-center">
                <div class="text-3xl font-bold text-orange-500">{{ $stats['comments'] }}</div>
                <div class="text-gray-500 mt-1">Комментариев</div>
            </div>
            <div class="bg-white rounded shadow p-6 text-center">
                <div class="text-3xl font-bold text-orange-500">{{ $stats['communities'] }}</div>
                <div class="text-gray-500 mt-1">Сообществ</div>
            </div>
        </div>

        <div class="flex gap-4">
            <a href="{{ route('admin.users') }}" style="background-color:#f97316;color:white;padding:8px 16px;border-radius:6px;text-decoration:none;">Пользователи</a>
            <a href="{{ route('admin.posts') }}" style="background-color:#f97316;color:white;padding:8px 16px;border-radius:6px;text-decoration:none;">Посты</a>
            <a href="{{ route('admin.communities') }}" style="background-color:#f97316;color:white;padding:8px 16px;border-radius:6px;text-decoration:none;">Сообщества</a>
        </div>
    </div>
</x-app-layout>
