<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Сообщества</h1>
            <a href="{{ route('admin.index') }}" style="color:#f97316;">← Назад</a>
        </div>

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="text-left px-4 py-3 text-sm">ID</th>
                        <th class="text-left px-4 py-3 text-sm">Название</th>
                        <th class="text-left px-4 py-3 text-sm">Создатель</th>
                        <th class="text-left px-4 py-3 text-sm">Постов</th>
                        <th class="text-left px-4 py-3 text-sm">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($communities as $community)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">{{ $community->id }}</td>
                        <td class="px-4 py-3 text-sm">r/{{ $community->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $community->user->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $community->posts_count }}</td>
                        <td class="px-4 py-3 text-sm">
                            <form method="POST" action="{{ route('admin.communities.delete', $community) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Удалить сообщество?')" style="background:#ef4444;color:white;padding:4px 10px;border-radius:4px;border:none;cursor:pointer;font-size:12px;">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $communities->links() }}</div>
    </div>
</x-app-layout>
