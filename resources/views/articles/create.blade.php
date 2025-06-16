{{-- resources/views/articles/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Новая статья') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('articles.store') }}" method="POST" class="space-y-4 bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Заголовок') }}</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-500 focus:ring-indigo-500"
                        required
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Текст') }}</label>
                    <textarea
                        name="body"
                        rows="6"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-500 focus:ring-indigo-500"
                        required
                    >{{ old('body') }}</textarea>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('articles.index') }}" class="mr-4 text-gray-600 dark:text-gray-400 hover:underline">
                        {{ __('Отмена') }}
                    </a>
                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white dark:text-gray-200 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                        {{ __('Сохранить') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
