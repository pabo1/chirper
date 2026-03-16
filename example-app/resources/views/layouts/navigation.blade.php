<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="text-xl font-bold text-orange-500">Reddit Clone</a>
                <a href="{{ route('communities.index') }}" class="text-gray-600 hover:text-gray-900">Сообщества</a>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Войти</a>
                    <a href="{{ route('register') }}" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Регистрация</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
