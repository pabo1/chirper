<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Посты</h1>
            <a href="{{ route('admin.index') }}" style="color:#f97316;">← Назад</a>
        </div>

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="text-left px-4 py-3 text-sm">ID</th>
                        <th class="text-left px-4 py-3 text-sm">Заголовок</th>
                        <th class="text-left px-4 py-3 text-sm">Автор</th>
                        <th class="text-left px-4 py-3 text-sm">Сообщество</th>
                        <th class="text-left px-4 py-3 text-sm">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">{{ $post->id }}</td>
                        <td class="px-4 py-3 text-sm">{{ $post->title }}</td>
                        <td class="px-4 py-3 text-sm">{{ $post->user->name }}</td>
                        <td class="px-4 py-3 text-sm">r/{{ $post->community->name }}</td>
                        <td class="px-4 py-3 text-sm">
                            <form method="POST" action="{{ route('admin.posts.delete', $post) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Удалить пост?')" style="background:#ef4444;color:white;padding:4px 10px;border-radius:4px;border:none;cursor:pointer;font-size:12px;">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $posts->links() }}</div>
    </div>
</x-app-layout>
