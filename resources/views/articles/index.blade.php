{{-- resources/views/articles/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Articles') }}
            </h2>

            @can('create', App\Models\Article::class)
                <a
                    href="{{ route('articles.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent
                           rounded-md font-semibold text-xs text-white uppercase tracking-widest
                           hover:bg-indigo-500 focus:outline-none focus:border-indigo-700
                           focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25
                           transition"
                >
                    {{ __('Create Article') }}
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @forelse($articles as $article)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        <a href="{{ route('articles.show', $article) }}" class="underline">
                            {{ $article->title }}
                        </a>
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        {{ Str::limit($article->body, 100) }}
                    </p>
                    <div class="mt-4 space-x-2">
                        @can('update', $article)
                            <a href="{{ route('articles.edit', $article) }}"
                               class="text-blue-500 hover:underline">
                                {{ __('Edit') }}
                            </a>
                        @endcan
                        @can('delete', $article)
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('{{ __('Are you sure?') }}')"
                                        class="text-red-500 hover:underline">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            @empty
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-600 dark:text-gray-400">{{ __('No articles yet.') }}</p>
                </div>
            @endforelse

            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
