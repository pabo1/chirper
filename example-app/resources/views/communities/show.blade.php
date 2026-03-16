<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">r/{{ $community->name }}</h2>
            <a href="{{ route('posts.create', $community) }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Создать пост</a>
        </div>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        <p class="text-gray-500 mb-6">{{ $community->description }}</p>

        @foreach($posts as $post)
            <div class="bg-white rounded shadow p-4 mb-4">
                <a href="{{ route('posts.show', $post) }}" class="text-lg font-bold text-blue-600">{{ $post->title }}</a>
                <p class="text-gray-400 text-xs mt-1">от {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}</p>
                <p class="text-gray-500 mt-1">👍 {{ $post->votes_count }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
