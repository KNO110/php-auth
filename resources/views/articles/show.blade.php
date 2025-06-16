{{-- resources/views/articles/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
                <p class="text-gray-900 dark:text-gray-100 whitespace-pre-line">
                    {{ $article->body }}
                </p>
                <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Автор:') }} {{ $article->user->name }} |
                    {{ $article->created_at->format('d.m.Y H:i') }}
                </p>
            </div>

            <div class="flex space-x-4">
                <a href="{{ route('articles.index') }}"
                   class="text-gray-600 dark:text-gray-400 hover:underline">
                    {{ __('← К списку') }}
                </a>

                @can('update', $article)
                    <a href="{{ route('articles.edit', $article) }}"
                       class="text-blue-500 hover:underline">
                        {{ __('Редактировать') }}
                    </a>
                @endcan

                @can('delete', $article)
                    <form action="{{ route('articles.destroy', $article) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            onclick="return confirm('{{ __('Удалить статью?') }}')"
                            class="text-red-500 hover:underline"
                        >
                            {{ __('Удалить') }}
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
