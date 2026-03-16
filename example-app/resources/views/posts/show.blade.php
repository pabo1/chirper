<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">{{ $post->title }}</h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        <div class="bg-white rounded shadow p-6 mb-6">
            <p class="text-xs text-gray-400 mb-2">
                <a href="{{ route('communities.show', $post->community) }}" class="text-blue-500">r/{{ $post->community->name }}</a>
                • от {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}
            </p>
            <p class="text-gray-700 mb-4">{{ $post->body }}</p>
            <div class="flex items-center gap-3">
                <form method="POST" action="{{ route('votes.store', $post) }}">
                    @csrf
                    <input type="hidden" name="value" value="1">
                    <button class="text-green-500">▲ Плюс</button>
                </form>
                <span class="font-bold">{{ $post->votes_count }}</span>
                <form method="POST" action="{{ route('votes.store', $post) }}">
                    @csrf
                    <input type="hidden" name="value" value="-1">
                    <button class="text-red-500">▼ Минус</button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded shadow p-6 mb-6">
            <h3 class="font-bold text-lg mb-4">Комментарии ({{ $post->comments->count() }})</h3>
            @auth
                <form method="POST" action="{{ route('comments.store', $post) }}" class="mb-6">
                    @csrf
                    <textarea name="body" rows="3" placeholder="Напиши комментарий..." class="w-full border rounded px-3 py-2 mb-2"></textarea>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Отправить</button>
                </form>
            @endauth

            @foreach($post->comments as $comment)
                <div class="border-b py-3">
                    <p class="text-xs text-gray-400 mb-1">{{ $comment->user->name }} • {{ $comment->created_at->diffForHumans() }}</p>
                    <p class="text-gray-700">{{ $comment->body }}</p>
                    @if(auth()->id() === $comment->user_id)
                        <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="mt-1">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs">Удалить</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
