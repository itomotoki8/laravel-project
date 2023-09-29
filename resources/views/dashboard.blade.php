<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <ul class="flex gap-10 justify-center items-center text-2xl">
                <li><a href="/">ホーム</a></li>
        </ul>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ログイン済み！") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
