<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Все посты</h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        @foreach($posts as $post)
            <div class="bg-white rounded shadow p-4 mb-4 flex gap-4">
                <div class="flex flex-col items-center gap-1">
                    <form method="POST" action="{{ route('votes.store', $post) }}">
                        @csrf
                        <input type="hidden" name="value" value="1">
                        <button class="text-gray-400 hover:text-green-500 text-xl">▲</button>
                    </form>
                    <span class="font-bold">{{ $post->votes_count }}</span>
                    <form method="POST" action="{{ route('votes.store', $post) }}">
                        @csrf
                        <input type="hidden" name="value" value="-1">
                        <button class="text-gray-400 hover:text-red-500 text-xl">▼</button>
                    </form>
                </div>
                <div>
                    <p class="text-xs text-gray-400">
                        <a href="{{ route('communities.show', $post->community) }}" class="text-blue-500">r/{{ $post->community->name }}</a>
                        • от {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}
                    </p>
                    <a href="{{ route('posts.show', $post) }}" class="text-lg font-bold text-gray-800 hover:text-blue-600">{{ $post->title }}</a>
                    <p class="text-gray-400 text-sm mt-1">💬 {{ $post->comments->count() }} комментариев</p>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
</x-app-layout>
