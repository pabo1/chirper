<x-app-layout>
    <div class="max-w-5xl mx-auto mt-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Пользователи</h1>
            <a href="{{ route('admin.index') }}" style="color:#f97316;">← Назад</a>
        </div>

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="text-left px-4 py-3 text-sm">ID</th>
                        <th class="text-left px-4 py-3 text-sm">Имя</th>
                        <th class="text-left px-4 py-3 text-sm">Email</th>
                        <th class="text-left px-4 py-3 text-sm">Админ</th>
                        <th class="text-left px-4 py-3 text-sm">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">{{ $user->id }}</td>
                        <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                        <td class="px-4 py-3 text-sm">{{ $user->is_admin ? '✅' : '❌' }}</td>
                        <td class="px-4 py-3 text-sm flex gap-2">
                            <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}">
                                @csrf
                                <button type="submit" style="background:#3b82f6;color:white;padding:4px 10px;border-radius:4px;border:none;cursor:pointer;font-size:12px;">
                                    {{ $user->is_admin ? 'Снять админа' : 'Сделать админом' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.users.delete', $user) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Удалить пользователя?')" style="background:#ef4444;color:white;padding:4px 10px;border-radius:4px;border:none;cursor:pointer;font-size:12px;">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $users->links() }}</div>
    </div>
</x-app-layout>
