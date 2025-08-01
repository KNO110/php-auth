<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in,") }} {{ Auth::user()->name }}!
                </p>
                <p class="mt-4">
                    <a href="{{ route('articles.index') }}"
                       class="text-blue-500 hover:underline">
                        {{ __('Go to Articles') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
